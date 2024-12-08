<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp;

use InvalidArgumentException;
use Override;
use Psr\Container\ContainerInterface;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Throwable;

use const PHP_VERSION;

final readonly class SetProvider implements SetProviderInterface
{
    public const array PHP = [
        '5.3' => Package\Php\Php53\Php53SetProvider::class,
        '5.4' => Package\Php\Php54\Php54SetProvider::class,
        '5.6' => Package\Php\Php56\Php56SetProvider::class,
        '7.0' => Package\Php\Php70\Php70SetProvider::class,
        '7.1' => Package\Php\Php71\Php71SetProvider::class,
        '7.2' => Package\Php\Php72\Php72SetProvider::class,
        '7.3' => Package\Php\Php73\Php73SetProvider::class,
        '7.4' => Package\Php\Php74\Php74SetProvider::class,
        '8.0' => Package\Php\Php80\Php80SetProvider::class,
        '8.1' => Package\Php\Php81\Php81SetProvider::class,
        '8.2' => Package\Php\Php82\Php82SetProvider::class,
        '8.3' => Package\Php\Php83\Php83SetProvider::class,
        '8.4' => Package\Php\Php84\Php84SetProvider::class,
        '8.5' => Package\Php\Php85\Php85SetProvider::class,
    ];

    public const array PROVIDERS = [
        'ghostwriter/arm' => Package\Ghostwriter\Arm\ArmSetProvider::class,
        'ghostwriter/case-converter' => Package\Ghostwriter\CaseConverter\CaseConverterSetProvider::class,
        'ghostwriter/cli' => Package\Ghostwriter\Cli\CliSetProvider::class,
        'ghostwriter/clock' => Package\Ghostwriter\Clock\ClockSetProvider::class,
        'ghostwriter/coding-standard' => Package\Ghostwriter\CodingStandard\CodingStandardSetProvider::class,
        'ghostwriter/collection' => Package\Ghostwriter\Collection\CollectionSetProvider::class,
        'ghostwriter/compliance' => Package\Ghostwriter\Compliance\ComplianceSetProvider::class,
        'ghostwriter/config' => Package\Ghostwriter\Config\ConfigSetProvider::class,
        'ghostwriter/container' => Package\Ghostwriter\Container\ContainerSetProvider::class,
        'ghostwriter/environment' => Package\Ghostwriter\Environment\EnvironmentSetProvider::class,
        'ghostwriter/event-dispatcher' => Package\Ghostwriter\EventDispatcher\EventDispatcherSetProvider::class,
        'ghostwriter/filesystem' => Package\Ghostwriter\Filesystem\FilesystemSetProvider::class,
        'ghostwriter/gfm' => Package\Ghostwriter\Gfm\GfmSetProvider::class,
        'ghostwriter/handrail' => Package\Ghostwriter\Handrail\HandrailSetProvider::class,
        'ghostwriter/http' => Package\Ghostwriter\Http\HttpSetProvider::class,
        'ghostwriter/json' => Package\Ghostwriter\Json\JsonSetProvider::class,
        'ghostwriter/option' => Package\Ghostwriter\Option\OptionSetProvider::class,
        'ghostwriter/phormat' => Package\Ghostwriter\Phormat\PhormatSetProvider::class,
        'ghostwriter/phpt' => Package\Ghostwriter\Phpt\PhptSetProvider::class,
        'ghostwriter/plex' => Package\Ghostwriter\Plex\PlexSetProvider::class,
        'ghostwriter/psalm-plugin' => Package\Ghostwriter\PsalmPlugin\PsalmPluginSetProvider::class,
        'ghostwriter/result' => Package\Ghostwriter\Result\ResultSetProvider::class,
        'ghostwriter/revamp' => Package\Ghostwriter\Revamp\RevampSetProvider::class,
        'ghostwriter/shell' => Package\Ghostwriter\Shell\ShellSetProvider::class,
        'ghostwriter/testify' => Package\Ghostwriter\Testify\TestifySetProvider::class,
        'ghostwriter/uuid' => Package\Ghostwriter\Uuid\UuidSetProvider::class,
        'mockery/mockery' => Package\Mockery\Mockery\MockerySetProvider::class,
        'nikic/php-parser' => Package\Nikic\PhpParser\PhpParserSetProvider::class,
        'phpunit/phpunit' => Package\Phpunit\Phpunit\PhpunitSetProvider::class,
        'vimeo/psalm' => Package\Vimeo\Psalm\PsalmSetProvider::class,
    ];

    public function __construct(
        private ContainerInterface $container,
    ) {
    }

    /**
     * @throws Throwable
     *
     * @return list<SetInterface>
     */
    #[Override]
    public function provide(): array
    {
        static $composerTriggeredSets = [];

        if ($composerTriggeredSets !== []) {
            return $composerTriggeredSets;
        }

        foreach (self::PHP as $version => $providerClass) {
            if (\version_compare(PHP_VERSION, $version, '<')) {
                continue;
            }

            $provider = $this->container->get($providerClass);

            if (! $provider instanceof SetProviderInterface) {
                throw new InvalidArgumentException(\sprintf(
                    'Provider "%s" must implement "%s" interface for PHP version "%s"',
                    $providerClass,
                    SetProviderInterface::class,
                    $version
                ));
            }

            foreach ($provider->provide() as $set) {
                $composerTriggeredSets[] = $set;
            }
        }

        foreach (self::PROVIDERS as $package => $providerClass) {
            $provider = $this->container->get($providerClass);

            if (! $provider instanceof SetProviderInterface) {
                throw new InvalidArgumentException(\sprintf(
                    'Provider "%s" must implement "%s" interface for package "%s"',
                    $providerClass,
                    SetProviderInterface::class,
                    $package
                ));
            }

            foreach ($provider->provide() as $set) {
                $composerTriggeredSets[] = $set;
            }
        }

        return $composerTriggeredSets;
    }
}
