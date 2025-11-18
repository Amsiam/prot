# Portfolio Project Documentation

## Project Overview
This is an **Academic Portfolio Management System** built with Laravel 12, Filament 4, and Livewire 3. It provides a complete backend admin panel (Filament) and a professional frontend single-page application to showcase academic work, research, publications, projects, certifications, and more.

## Tech Stack
- **Laravel 12** - Backend framework
- **Filament 4** - Admin panel builder
- **Livewire 3** - Frontend reactive components
- **Tailwind CSS 4** - Styling framework
- **SQLite** - Database (check `database/database.sqlite`)

## Design Philosophy
- **Professional & Clean Design** - No gradients, no fancy animations
- **Solid colors, clean borders, subtle transitions**
- **File uploads use public disk** - All FileUpload components must have `->disk('public')`
- **Polymorphic tagging system** - Shared tags across multiple models

---

## Database Structure

### Core Portfolio Sections

#### 1. Research Areas (`research_areas`)
- `id`, `title`, `description`, `color`, `timestamps`
- Uses polymorphic tags via `taggable` relationship

#### 2. Publications (`publications`)
- `id`, `title`, `authors`, `publication_name`, `year`, `status`, `contribution`, `abstract`, `link`, `timestamps`
- Uses polymorphic tags
- Status: "Published" or other (In Progress, Under Review)

#### 3. Projects (`projects`)
- `id`, `title`, `description`, `color`, `order`, `timestamps`
- **Has many** project_images
- **Has many** project_videos
- Uses polymorphic tags

##### Project Images (`project_images`)
- `id`, `project_id`, `image`, `caption`, `order`, `timestamps`
- Foreign key to `projects` with cascade delete

##### Project Videos (`project_videos`)
- `id`, `project_id`, `video_file`, `video_url`, `title`, `order`, `timestamps`
- Can have either `video_file` (uploaded) OR `video_url` (external link)
- Both fields are nullable

#### 4. Certifications (`certifications`)
- `id`, `title`, `issuer`, `date`, `description`, `image`, `order`, `timestamps`
- Date is cast to Carbon date

#### 5. Hobbies (`hobbies`)
- `id`, `title`, `description`, `icon`, `order`, `timestamps`
- Icon field for emoji or icon name

#### 6. Education (`education`)
- `id`, `institution`, `degree`, `field`, `start_date`, `end_date`, `description`, `timestamps`

#### 7. Experience (`experiences`)
- `id`, `title`, `company`, `location`, `start_date`, `end_date`, `description`, `current`, `timestamps`

#### 8. Honour Awards (`honour_awards`)
- `id`, `title`, `issuer`, `date`, `description`, `timestamps`

#### 9. Technical Skills (`technical_skills`)
- `id`, `name`, `category`, `proficiency`, `timestamps`

#### 10. Gallery (`galaries`)
- `id`, `title`, `description`, `link`, `category`, `timestamps`
- **Has many** galary_images

##### Gallery Images (`galary_images`)
- `id`, `galary_id`, `image_path`, `timestamps`

#### 11. Contact (`contacts`)
- `id`, `name`, `email`, `message`, `timestamps`

#### 12. MySelf (`my_selves`)
- `id`, `name`, `title`, `bio`, `image`, `resume`, `timestamps`

#### 13. Social Media (`social_media`)
- `id`, `platform`, `url`, `icon`, `timestamps`

### Tagging System
#### Tags (`tags`)
- `id`, `name`, `slug`, `timestamps`

#### Taggables (`taggables`)
- `tag_id`, `taggable_id`, `taggable_type`
- Polymorphic relationship supporting ResearchArea, Publication, Project

---

## Models Structure

### Pattern for Models with Tags
```php
class Project extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['tags'];

    public function tagsR()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function setTagsAttribute($value)
    {
        $tagIds = collect(explode(',', $value))->map(function ($tagName) {
            return Tag::firstOrCreate(
                ['slug' => Str::slug($tagName)],
                ['name' => $tagName]
            )->id;
        });

        if ($this->exists) {
            $this->tagsR()->sync($tagIds);
        } else {
            $this->saved(function ($model) use ($tagIds) {
                $model->tagsR()->sync($tagIds);
            });
        }
    }

    public function getTagsAttribute(): array
    {
        return $this->tagsR()->pluck('name')->toArray();
    }
}
```

### Models with Relationships
- **Project**: `hasMany(ProjectImage::class)`, `hasMany(ProjectVideo::class)`
- **Galary**: `hasMany(GalaryImage::class)`

---

## Filament Resources Structure

### Directory Pattern
```
app/Filament/Resources/
├── Certifications/
│   ├── CertificationResource.php
│   ├── Schemas/CertificationForm.php
│   ├── Tables/CertificationsTable.php
│   └── Pages/
│       ├── CreateCertification.php
│       ├── EditCertification.php
│       └── ListCertifications.php
├── Projects/
│   ├── ProjectResource.php
│   ├── Schemas/ProjectForm.php
│   ├── Tables/ProjectsTable.php
│   └── Pages/...
```

### Form Pattern (with FileUpload)
```php
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use App\Models\Tag;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')->required(),
            RichEditor::make('description'),
            ColorPicker::make('color')->label('Border Color'),
            TagsInput::make('tags')
                ->separator(',')
                ->suggestions(fn() => Tag::pluck('name')->toArray()),

            // File uploads MUST use public disk
            Repeater::make('images')
                ->relationship()
                ->schema([
                    FileUpload::make('image')
                        ->image()
                        ->required()
                        ->disk('public'), // REQUIRED!
                    TextInput::make('caption'),
                    TextInput::make('order')->numeric()->default(0),
                ])
                ->columnSpanFull()
                ->columns(3) // 3-column grid
                ->orderColumn('order'),
        ]);
    }
}
```

### Table Pattern
```php
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title')->searchable(),
            TextColumn::make('description')->limit(50)->html(),
            ColorColumn::make('color'),
            TextColumn::make('images_count')->counts('images'),
            TextColumn::make('order')->numeric()->sortable(),
        ]);
    }
}
```

---

## Livewire Components

### Component Pattern
```php
namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Projects extends Component
{
    #[Computed()]
    public function projects()
    {
        return \App\Models\Project::with(['images', 'videos'])
            ->orderBy('order')
            ->get();
    }

    public function render()
    {
        return view('livewire.projects');
    }
}
```

### Available Components
Located in `app/Livewire/`:
- `Hero.php` - Hero section
- `About.php` - About section
- `Research.php` - Research areas
- `Projects.php` - Projects showcase
- `Publications.php` - Publications list
- `Experience.php` - Work experience
- `HonourAward.php` - Honours and technical skills
- `Certification.php` - Certifications
- `Hobby.php` - Hobbies and interests
- `Images.php` - Gallery
- `ContactMe.php` - Contact form
- `Navbar.php`, `Footer.php` - Navigation components

---

## Frontend Views

### Main Layout (`resources/views/welcome.blade.php`)
```php
<body>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-white">
        @livewire('navbar')
        @livewire('hero')
        @livewire('about')
        @livewire('research')
        @livewire('projects')
        @livewire('publications')
        @livewire('images')
        @livewire('experience')
        @livewire('honour-award')
        @livewire('certification')
        @livewire('hobby')
        @livewire('contact-me')
        @livewire('footer')
    </div>
</body>
```

### View Pattern (Professional Design)
```blade
<section id="projects" class="py-16 px-6 bg-slate-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-slate-900 mb-12 text-center">Projects</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($this->projects as $project)
                <div data-slot="card"
                     style="border-left-color: {{ $project->color }};"
                     class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-l-4 hover:shadow-lg transition-shadow">

                    {{-- Image display --}}
                    @if ($project->images->count() > 0)
                        <div class="px-6">
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($project->images->take(4) as $image)
                                    <img src="{{ asset('storage/' . $image->image) }}"
                                         class="w-full h-32 object-cover rounded-lg border border-slate-200">
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Content --}}
                    <div data-slot="card-content" class="px-6">
                        <div class="text-slate-600 mb-3">
                            {!! $project->description !!}
                        </div>

                        {{-- Tags --}}
                        <div class="flex flex-wrap gap-1">
                            @foreach ($project->tags as $tag)
                                <span data-slot="badge" class="...">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
```

---

## Key Patterns & Conventions

### 1. File Uploads
- **ALWAYS use `->disk('public')`** for FileUpload components
- Images stored in `storage/app/public/`
- Access via `asset('storage/' . $filename)`

### 2. Design System
- **No gradients** - User explicitly rejected gradient designs
- Use solid colors: `bg-blue-600`, `bg-slate-900`
- Clean borders: `border border-slate-200`
- Subtle effects: `hover:shadow-lg transition-shadow`

### 3. Color System
- Models can have a `color` field for border customization
- Use `style="border-left-color: {{ $model->color }};"` with `border-l-4` class

### 4. Ordering
- Use `order` field with default value 0
- Query: `->orderBy('order')`
- In Filament: `->orderColumn('order')`

### 5. Rich Text
- Use `RichEditor::make()` in forms
- Display with `{!! $model->field !!}` to render HTML

### 6. Repeaters in Filament
- Use 3-column grid: `->columns(3)`
- Always include order field
- Use `->columnSpanFull()` for full width

---

## How to Add a New Section

### Step-by-Step Guide

#### 1. Create Migration
```bash
php artisan make:migration create_section_name_table
```

Edit migration:
```php
Schema::create('section_name', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description')->nullable();
    $table->integer('order')->default(0);
    $table->timestamps();
});
```

Run: `php artisan migrate`

#### 2. Create Model
```bash
# Create manually at app/Models/SectionName.php
```

```php
class SectionName extends Model
{
    protected $guarded = ['id'];
    // Add casts, relationships, etc.
}
```

#### 3. Create Filament Resource
```bash
php artisan make:filament-resource SectionName --generate
```

Edit form schema at `app/Filament/Resources/SectionNames/Schemas/SectionNameForm.php`:
```php
use Filament\Forms\Components\FileUpload;

return $schema->components([
    TextInput::make('title')->required(),
    FileUpload::make('image')
        ->image()
        ->disk('public'), // IMPORTANT!
]);
```

#### 4. Create Livewire Component
Create `app/Livewire/SectionName.php`:
```php
class SectionName extends Component
{
    #[Computed()]
    public function items()
    {
        return \App\Models\SectionName::orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.section-name');
    }
}
```

#### 5. Create View
Create `resources/views/livewire/section-name.blade.php`:
```blade
<section id="section-name" class="py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-slate-900 mb-12 text-center">Section Title</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($this->items as $item)
                <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm hover:shadow-lg transition-shadow">
                    {{-- Content --}}
                </div>
            @endforeach
        </div>
    </div>
</section>
```

#### 6. Add to Welcome Page
Edit `resources/views/welcome.blade.php`:
```blade
@livewire('section-name')
```

---

## File Locations Reference

### Backend
- **Models**: `app/Models/`
- **Migrations**: `database/migrations/`
- **Filament Resources**: `app/Filament/Resources/`
- **Livewire Components**: `app/Livewire/`

### Frontend
- **Views**: `resources/views/livewire/`
- **Main Layout**: `resources/views/welcome.blade.php`
- **CSS**: Uses Tailwind CSS 4 (inline styles in welcome.blade.php)

### Storage
- **Uploaded Files**: `storage/app/public/`
- **Public Access**: `public/storage/` (symlinked)

---

## Common Tasks

### Add Tags Support to Model
1. Add to migration: No additional fields needed (uses polymorphic table)
2. Add to model: Use the tag pattern shown above
3. Add to form:
```php
TagsInput::make('tags')
    ->separator(',')
    ->suggestions(fn() => Tag::pluck('name')->toArray())
```

### Add Relationship (One-to-Many)
1. Create related table migration with foreign key
2. Add relationship methods to both models
3. Use Repeater in Filament form:
```php
Repeater::make('relationName')
    ->relationship()
    ->schema([...])
    ->columnSpanFull()
    ->columns(3)
```

### Display Uploaded Images
```blade
@if ($model->image)
    <img src="{{ asset('storage/' . $model->image) }}"
         alt="{{ $model->title }}"
         class="w-full h-48 object-cover rounded-lg border border-slate-200">
@endif
```

### Display Uploaded Videos
```blade
@if ($model->video_file)
    <video controls class="w-full rounded-lg border border-slate-200">
        <source src="{{ asset('storage/' . $model->video_file) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
@endif
```

---

## Important Notes

1. **File Upload Disk**: Always use `->disk('public')` or files won't be accessible
2. **Design Style**: Keep it professional - no gradients, clean and minimal
3. **Model Protection**: Use `protected $guarded = ['id'];` instead of `$fillable`
4. **Date Casting**: Add to model: `protected $casts = ['date_field' => 'date'];`
5. **Order By**: Most queries should order by `order` field for custom sorting
6. **HTML Content**: Use RichEditor in forms, display with `{!! !!}` in views
7. **Polymorphic Tags**: Multiple models can share the same tag system
8. **Grid Layouts**: Use `grid md:grid-cols-2 lg:grid-cols-3 gap-6` for responsive cards

---

## Admin Panel Access

- URL: `/admin`
- Navigate through the sidebar to manage each section
- All CRUD operations available for each resource
- File uploads handled automatically by Filament

---

## Database

- Type: SQLite
- Location: `database/database.sqlite`
- Check existing data here before making changes

---

This documentation should help any LLM understand the project structure and maintain consistency when making changes.
