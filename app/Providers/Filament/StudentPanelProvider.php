<?php

namespace App\Providers\Filament;

use App\Http\Middleware\CheckEnrollmentStatus;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use App\Filament\Student\Pages\StudentDashboard;
use App\Filament\Student\Pages\EditProfile;
use App\Filament\Student\Resources\Announcements\AnnouncementResource;
use App\Filament\Student\Resources\Books\BookResource;
use App\Filament\Student\Resources\Certificates\CertificateResource;
use App\Filament\Student\Resources\Enrollments\EnrollmentResource;
use App\Filament\Student\Resources\Events\EventResource;
use App\Filament\Student\Resources\Exams\ExamResource;
use App\Filament\Student\Resources\Grades\GradeResource;
use App\Filament\Student\Resources\LiveClasses\LiveClassResource;
use App\Filament\Student\Resources\Notifications\NotificationResource;
use App\Filament\Student\Resources\StudentDocuments\StudentDocumentResource;
use App\Filament\Student\Resources\Timetables\TimetableResource;
use App\Filament\Student\Resources\Transactions\TransactionResource;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class StudentPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('student')
            ->path('student')
            ->login()
            ->registration()
            ->passwordReset()
            ->profile(\App\Filament\Student\Pages\EditProfile::class)
            
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('2.75rem')
            ->brandName('Goshen Work Skill Association')
            ->favicon(asset('images/logo.png'))
            
            ->colors([
                'primary' => '#091c3d',
                'gray' => Color::Zinc,
                'info' => '#1e3a5f',
                'warning' => '#f5a524',
                'danger' => '#c1121f',
                'success' => Color::Emerald,
            ])
            
            ->font('Inter')
            ->darkMode(false)
            ->sidebarCollapsibleOnDesktop()
            
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
            ->renderHook(
                'panels::styles.after',
                fn () => view('filament-student-branding'),
            )
            
            ->discoverResources(in: app_path('Filament/Student/Resources'), for: 'App\\Filament\\Student\\Resources')
            ->discoverPages(in: app_path('Filament/Student/Pages'), for: 'App\\Filament\\Student\\Pages')
            ->pages([
                StudentDashboard::class,
            ])
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder
                    ->groups([
                        NavigationGroup::make('General')
                            ->items([
                                NavigationItem::make('Dashboard')
                                    ->icon('heroicon-o-home')
                                    ->url(fn () => url('/student'))
                                    ->isActiveWhen(fn () => request()->is('student') || request()->is('student/dashboard*')),
                            ]),
                        NavigationGroup::make('Academics')
                            ->items([
                                NavigationItem::make('My Exams')
                                    ->icon('heroicon-o-pencil-square')
                                    ->sort(3)
                                    ->url(fn () => ExamResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/exams*')),
                            ]),
                        NavigationGroup::make('Enrollment')
                            ->items([
                                NavigationItem::make('Enrollments')
                                    ->icon('heroicon-o-academic-cap')
                                    ->url(fn () => EnrollmentResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/enrollments*')),
                            ]),
                        NavigationGroup::make('Resources')
                            ->items([
                                NavigationItem::make('Grades')
                                    ->icon('heroicon-o-chart-bar')
                                    ->url(fn () => GradeResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/grades*')),
                                NavigationItem::make('Books')
                                    ->icon('heroicon-o-book-open')
                                    ->url(fn () => BookResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/books*')),
                                NavigationItem::make('Certificates')
                                    ->icon('heroicon-o-document-text')
                                    ->url(fn () => CertificateResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/certificates*')),
                                NavigationItem::make('Timetables')
                                    ->icon('heroicon-o-calendar-days')
                                    ->url(fn () => TimetableResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/timetables*')),
                                NavigationItem::make('Events')
                                    ->icon('heroicon-o-calendar')
                                    ->url(fn () => EventResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/events*')),
                                NavigationItem::make('Live Classes')
                                    ->icon('heroicon-o-video-camera')
                                    ->url(fn () => LiveClassResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/live-classes*')),
                                NavigationItem::make('Student Documents')
                                    ->icon('heroicon-o-document-duplicate')
                                    ->url(fn () => StudentDocumentResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/student-documents*')),
                            ]),
                        NavigationGroup::make('Communications')
                            ->items([
                                NavigationItem::make('Notifications')
                                    ->icon('heroicon-o-bell')
                                    ->url(fn () => NotificationResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/notifications*')),
                                NavigationItem::make('Announcements')
                                    ->icon('heroicon-o-megaphone')
                                    ->url(fn () => AnnouncementResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/announcements*')),
                            ]),
                        NavigationGroup::make('Finance')
                            ->items([
                                NavigationItem::make('Transactions')
                                    ->icon('heroicon-o-credit-card')
                                    ->url(fn () => TransactionResource::getUrl())
                                    ->isActiveWhen(fn () => request()->is('student/transactions*')),
                            ]),
                    ]);
            })
            ->widgets([
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                CheckEnrollmentStatus::class,
            ]);
    }
}