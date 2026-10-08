import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './vendor/jeffersongoncalves/filament-editorial-theme/resources/views/**/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/components/**/*.blade.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
