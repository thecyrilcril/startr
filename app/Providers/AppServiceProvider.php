<?php

declare(strict_types=1);

namespace App\Providers;

use App\Traits\BlueprintMacros;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

final class AppServiceProvider extends ServiceProvider
{
    use BlueprintMacros;
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureCommands();
        $this->configureModels();
        $this->configureDates();
        $this->configureUrls();
        $this->configureVite();
        $this->configurePasswordValidation();
        $this->registerBlueprintMacros();
    }

    /**
     * Configure the application's commands.
     */
    private function configureCommands(): void
    {
        DB::prohibitDestructiveCommands(prohibit: $this->app->isProduction());
    }

    /**
     * Configure the application's models
     */
    private function configureModels(): void
    {
        Model::unguard();
        Model::shouldBeStrict(shouldBeStrict: ! $this->app->isProduction());
    }

    /**
     * Configure the application's dates.
     */
    private function configureDates(): void
    {
        Date::use(CarbonImmutable::class);
        Carbon::useMonthsOverflow(false);
        Carbon::macro(name: 'inApplicationTimezone', macro: fn() => $this->tz(config('app.display_timezone')));


    }

    /**
     * Configure the application's URLs.
     */
    private function configureUrls(): void
    {
        URL::forceScheme(scheme: 'https');
    }

    /**
     * Configure the application's Vite instance.
     */
    private function configureVite(): void
    {
        Vite::useAggressivePrefetching();
    }

    /**
     * Configure the password validation rules.
     */
    private function configurePasswordValidation(): void
    {
        Password::defaults(callback: fn() => $this->app->isProduction() ? Password::min(8)->uncompromised() : null);
    }

}
