<?php

use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('projects can be viewed and the create and edit forms are available', function () {
    $project = Project::create([
        'title' => 'Weather App',
        'description' => 'A local weather dashboard.',
    ]);

    $this->get(route('admin.projects.index'))
        ->assertOk()
        ->assertSee('Weather App')
        ->assertSee('href="'.route('admin.projects.create').'"', false)
        ->assertSee('href="'.route('admin.projects.edit', $project).'"', false)
        ->assertSee('action="'.route('admin.projects.destroy', $project).'"', false);

    $this->get(route('admin.projects.create'))
        ->assertOk()
        ->assertSee('action="'.route('admin.projects.store').'"', false);

    $this->get(route('admin.projects.edit', $project))
        ->assertOk()
        ->assertSee('action="'.route('admin.projects.update', $project).'"', false);
});

test('a project can be created with an uploaded image', function () {
    Storage::fake('public');

    $response = $this->post(route('admin.projects.store'), [
        'title' => 'Weather App',
        'description' => 'A local weather dashboard.',
        'github_url' => 'https://github.com/example/weather',
        'live_url' => 'https://weather.example.com',
        'image' => UploadedFile::fake()->image('weather.png'),
    ]);

    $response->assertRedirect(route('admin.projects.index'))
        ->assertSessionHas('success');

    $project = Project::where('title', 'Weather App')->firstOrFail();

    expect($project->description)->toBe('A local weather dashboard.')
        ->and($project->github_url)->toBe('https://github.com/example/weather')
        ->and($project->live_url)->toBe('https://weather.example.com')
        ->and($project->image_path)->not->toBeNull();

    expect(Storage::disk('public')->exists($project->image_path))->toBeTrue();
});

test('a project can be updated while preserving or replacing its image', function () {
    Storage::fake('public');

    $oldImage = 'projects/old.png';
    Storage::disk('public')->put($oldImage, 'old image');

    $project = Project::create([
        'title' => 'Weather App',
        'description' => 'Original description.',
        'image_path' => $oldImage,
    ]);

    $this->put(route('admin.projects.update', $project), [
        'title' => 'Weather Dashboard',
        'description' => 'Updated description.',
        'github_url' => 'https://github.com/example/dashboard',
        'live_url' => 'https://dashboard.example.com',
    ])->assertRedirect(route('admin.projects.index'))
        ->assertSessionHas('success');

    $project->refresh();

    expect($project->title)->toBe('Weather Dashboard')
        ->and($project->description)->toBe('Updated description.')
        ->and($project->image_path)->toBe($oldImage);

    expect(Storage::disk('public')->exists($oldImage))->toBeTrue();

    $this->put(route('admin.projects.update', $project), [
        'title' => 'Weather Dashboard',
        'description' => 'Updated description.',
        'image' => UploadedFile::fake()->image('new-weather.png'),
    ])->assertRedirect(route('admin.projects.index'));

    $project->refresh();

    expect($project->image_path)->not->toBe($oldImage);
    expect(Storage::disk('public')->exists($oldImage))->toBeFalse()
        ->and(Storage::disk('public')->exists($project->image_path))->toBeTrue();
});

test('a project and its image can be deleted', function () {
    Storage::fake('public');

    $imagePath = 'projects/weather.png';
    Storage::disk('public')->put($imagePath, 'image');

    $project = Project::create([
        'title' => 'Weather App',
        'description' => 'A local weather dashboard.',
        'image_path' => $imagePath,
    ]);

    $this->delete(route('admin.projects.destroy', $project))
        ->assertRedirect(route('admin.projects.index'))
        ->assertSessionHas('success');

    $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    expect(Storage::disk('public')->exists($imagePath))->toBeFalse();
});

test('invalid project data is rejected', function () {
    $this->post(route('admin.projects.store'), [
        'title' => '',
        'description' => '',
        'github_url' => 'not-a-url',
    ])->assertSessionHasErrors(['title', 'description', 'github_url']);
});
