<?php

namespace App\Filament\Resources\CertificateTemplates\Pages;

use App\Filament\Resources\CertificateTemplates\CertificateTemplateResource;
use App\Models\CertificateTemplate;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Storage;

class DesignCertificateTemplate extends Page
{
    protected static string $resource = CertificateTemplateResource::class;

    protected string $view = 'filament.admin.resources.certificate-templates.design';

    public CertificateTemplate $record;
    public ?array $config = [];
    public ?string $backgroundUrl = '';

    public function mount(): void
    {
        $this->config = $this->record->config ?? [
            'fields' => [],
            'page_width' => 1200,
            'page_height' => 800,
        ];
        $this->backgroundUrl = Storage::disk('public')->url($this->record->background_file);
    }

    public function save(): void
    {
        $this->record->update(['config' => $this->config]);
        $this->dispatch('saved');
    }

    public function addField(): void
    {
        $fields = $this->config['fields'] ?? [];
        $fields[] = [
            'id' => uniqid('field_'),
            'label' => 'New Field',
            'placeholder' => '[TEXT]',
            'x' => 100,
            'y' => 100,
            'width' => 300,
            'height' => 50,
            'font_size' => 28,
            'font_color' => '#1a365d',
            'font_weight' => 'bold',
            'text_align' => 'center',
        ];
        $this->config['fields'] = $fields;
    }

    public function removeField(string $fieldId): void
    {
        $this->config['fields'] = array_values(array_filter(
            $this->config['fields'] ?? [],
            fn ($f) => $f['id'] !== $fieldId
        ));
    }
}
