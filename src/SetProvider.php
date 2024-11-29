<?php

declare(strict_types=1);

namespace Ghostwriter\Revamp;

use Psr\Container\ContainerInterface;
use Rector\Set\Contract\SetInterface;
use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;

use const DIRECTORY_SEPARATOR;

final readonly class SetProvider implements SetProviderInterface
{
    public const array PROVIDERS = [
        'composer' => [
            'composer' => [\Ghostwriter\Revamp\SetProvider\Composer\Composer\ComposerSetProvider::class],
        ],
        'fig' => [
            'http-message-util' => [
                \Ghostwriter\Revamp\SetProvider\Fig\HttpMessageUtil\HttpMessageUtilSetProvider::class,
            ],
        ],
        'filp' => [
            'whoops' => [\Ghostwriter\Revamp\SetProvider\Filp\Whoops\WhoopsSetProvider::class],
        ],
        'ghostwriter' => [
            'arm' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Arm\ArmSetProvider::class],
            'case-converter' => [
                \Ghostwriter\Revamp\SetProvider\Ghostwriter\CaseConverter\CaseConverterSetProvider::class,
            ],
            'cli' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Cli\CliSetProvider::class],
            'clock' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Clock\ClockSetProvider::class],
            'coding-standard' => [
                \Ghostwriter\Revamp\SetProvider\Ghostwriter\CodingStandard\CodingStandardSetProvider::class,
            ],
            'collection' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Collection\CollectionSetProvider::class],
            'compliance' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Compliance\ComplianceSetProvider::class],
            'config' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Config\ConfigSetProvider::class],
            'container' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Container\ContainerSetProvider::class],
            'environment' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Environment\EnvironmentSetProvider::class],
            'event-dispatcher' => [
                \Ghostwriter\Revamp\SetProvider\Ghostwriter\EventDispatcher\EventDispatcherSetProvider::class,
            ],
            'filesystem' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Filesystem\FilesystemSetProvider::class],
            'gfm' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Gfm\GfmSetProvider::class],
            'handrail' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Handrail\HandrailSetProvider::class],
            'http' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Http\HttpSetProvider::class],
            'json' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Json\JsonSetProvider::class],
            'option' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Option\OptionSetProvider::class],
            'phormat' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Phormat\PhormatSetProvider::class],
            'phpt' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\PHPt\PHPtSetProvider::class],
            'plex' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Plex\PlexSetProvider::class],
            'psalm-plugin' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\PsalmPlugin\PsalmPluginSetProvider::class],
            'result' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Result\ResultSetProvider::class],
            'revamp' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Revamp\RevampSetProvider::class],
            'shell' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Shell\ShellSetProvider::class],
            'testify' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Testify\TestifySetProvider::class],
            'uuid' => [\Ghostwriter\Revamp\SetProvider\Ghostwriter\Uuid\UuidSetProvider::class],
        ],
        'laminas' => [
            'laminas-authentication' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasAuthentication\LaminasAuthenticationSetProvider::class,
            ],
            'laminas-barcode' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasBarcode\LaminasBarcodeSetProvider::class,
            ],
            'laminas-cache' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCache\LaminasCacheSetProvider::class,
            ],
            'laminas-cache-storage-adapter-apcu' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterApcu\LaminasCacheStorageAdapterApcuSetProvider::class,
            ],
            'laminas-cache-storage-adapter-benchmark' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterBenchmark\LaminasCacheStorageAdapterBenchmarkSetProvider::class,
            ],
            'laminas-cache-storage-adapter-blackhole' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterBlackhole\LaminasCacheStorageAdapterBlackholeSetProvider::class,
            ],
            'laminas-cache-storage-adapter-ext-mongodb' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterExtMongodb\LaminasCacheStorageAdapterExtMongodbSetProvider::class,
            ],
            'laminas-cache-storage-adapter-filesystem' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterFilesystem\LaminasCacheStorageAdapterFilesystemSetProvider::class,
            ],
            'laminas-cache-storage-adapter-memcached' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterMemcached\LaminasCacheStorageAdapterMemcachedSetProvider::class,
            ],
            'laminas-cache-storage-adapter-memory' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterMemory\LaminasCacheStorageAdapterMemorySetProvider::class,
            ],
            'laminas-cache-storage-adapter-redis' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterRedis\LaminasCacheStorageAdapterRedisSetProvider::class,
            ],
            'laminas-cache-storage-adapter-session' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterSession\LaminasCacheStorageAdapterSessionSetProvider::class,
            ],
            'laminas-cache-storage-adapter-test' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageAdapterTest\LaminasCacheStorageAdapterTestSetProvider::class,
            ],
            'laminas-cache-storage-deprecated-factory' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCacheStorageDeprecatedFactory\LaminasCacheStorageDeprecatedFactorySetProvider::class,
            ],
            'laminas-captcha' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCaptcha\LaminasCaptchaSetProvider::class,
            ],
            'laminas-cli' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasCli\LaminasCliSetProvider::class],
            'laminas-code' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasCode\LaminasCodeSetProvider::class],
            'laminas-coding-standard' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasCodingStandard\LaminasCodingStandardSetProvider::class,
            ],
            'laminas-component-installer' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasComponentInstaller\LaminasComponentInstallerSetProvider::class,
            ],
            'laminas-composer-autoloading' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasComposerAutoloading\LaminasComposerAutoloadingSetProvider::class,
            ],
            'laminas-config' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasConfig\LaminasConfigSetProvider::class,
            ],
            'laminas-config-aggregator' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasConfigAggregator\LaminasConfigAggregatorSetProvider::class,
            ],
            'laminas-config-aggregator-parameters' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasConfigAggregatorParameters\LaminasConfigAggregatorParametersSetProvider::class,
            ],
            'laminas-container-config-test' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasContainerConfigTest\LaminasContainerConfigTestSetProvider::class,
            ],
            'laminas-db' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasDb\LaminasDbSetProvider::class],
            'laminas-dependency-plugin' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasDependencyPlugin\LaminasDependencyPluginSetProvider::class,
            ],
            'laminas-developer-tools' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasDeveloperTools\LaminasDeveloperToolsSetProvider::class,
            ],
            'laminas-development-mode' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasDevelopmentMode\LaminasDevelopmentModeSetProvider::class,
            ],
            'laminas-di' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasDi\LaminasDiSetProvider::class],
            'laminas-diactoros' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasDiactoros\LaminasDiactorosSetProvider::class,
            ],
            'laminas-diagnostics' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasDiagnostics\LaminasDiagnosticsSetProvider::class,
            ],
            'laminas-escaper' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasEscaper\LaminasEscaperSetProvider::class,
            ],
            'laminas-eventmanager' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasEventmanager\LaminasEventmanagerSetProvider::class,
            ],
            'laminas-feed' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasFeed\LaminasFeedSetProvider::class],
            'laminas-filter' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasFilter\LaminasFilterSetProvider::class,
            ],
            'laminas-form' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasForm\LaminasFormSetProvider::class],
            'laminas-http' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasHttp\LaminasHttpSetProvider::class],
            'laminas-httphandlerrunner' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasHttphandlerrunner\LaminasHttphandlerrunnerSetProvider::class,
            ],
            'laminas-hydrator' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasHydrator\LaminasHydratorSetProvider::class,
            ],
            'laminas-i18n' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasI18N\LaminasI18NSetProvider::class],
            'laminas-i18n-phone-number' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasI18NPhoneNumber\LaminasI18NPhoneNumberSetProvider::class,
            ],
            'laminas-i18n-resources' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasI18NResources\LaminasI18NResourcesSetProvider::class,
            ],
            'laminas-inputfilter' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasInputfilter\LaminasInputfilterSetProvider::class,
            ],
            'laminas-json-server' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasJsonServer\LaminasJsonServerSetProvider::class,
            ],
            'laminas-ldap' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasLdap\LaminasLdapSetProvider::class],
            'laminas-log' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasLog\LaminasLogSetProvider::class],
            'laminas-math' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasMath\LaminasMathSetProvider::class],
            'laminas-memory' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMemory\LaminasMemorySetProvider::class,
            ],
            'laminas-migration' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMigration\LaminasMigrationSetProvider::class,
            ],
            'laminas-modulemanager' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasModulemanager\LaminasModulemanagerSetProvider::class,
            ],
            'laminas-mvc' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvc\LaminasMvcSetProvider::class],
            'laminas-mvc-form' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvcForm\LaminasMvcFormSetProvider::class,
            ],
            'laminas-mvc-i18n' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvcI18N\LaminasMvcI18NSetProvider::class,
            ],
            'laminas-mvc-middleware' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvcMiddleware\LaminasMvcMiddlewareSetProvider::class,
            ],
            'laminas-mvc-plugin-fileprg' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvcPluginFileprg\LaminasMvcPluginFileprgSetProvider::class,
            ],
            'laminas-mvc-plugin-flashmessenger' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvcPluginFlashmessenger\LaminasMvcPluginFlashmessengerSetProvider::class,
            ],
            'laminas-mvc-plugin-identity' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvcPluginIdentity\LaminasMvcPluginIdentitySetProvider::class,
            ],
            'laminas-mvc-plugin-prg' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvcPluginPrg\LaminasMvcPluginPrgSetProvider::class,
            ],
            'laminas-mvc-plugins' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvcPlugins\LaminasMvcPluginsSetProvider::class,
            ],
            'laminas-mvc-skeleton' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasMvcSkeleton\LaminasMvcSkeletonSetProvider::class,
            ],
            'laminas-navigation' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasNavigation\LaminasNavigationSetProvider::class,
            ],
            'laminas-paginator' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasPaginator\LaminasPaginatorSetProvider::class,
            ],
            'laminas-paginator-adapter-laminasdb' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasPaginatorAdapterLaminasdb\LaminasPaginatorAdapterLaminasdbSetProvider::class,
            ],
            'laminas-permissions-acl' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasPermissionsAcl\LaminasPermissionsAclSetProvider::class,
            ],
            'laminas-permissions-rbac' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasPermissionsRbac\LaminasPermissionsRbacSetProvider::class,
            ],
            'laminas-progressbar' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasProgressbar\LaminasProgressbarSetProvider::class,
            ],
            'laminas-psr7bridge' => [],
            'laminas-recaptcha' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasRecaptcha\LaminasRecaptchaSetProvider::class,
            ],
            'laminas-router' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasRouter\LaminasRouterSetProvider::class,
            ],
            'laminas-serializer' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasSerializer\LaminasSerializerSetProvider::class,
            ],
            'laminas-server' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasServer\LaminasServerSetProvider::class,
            ],
            'laminas-servicemanager' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasServicemanager\LaminasServicemanagerSetProvider::class,
            ],
            'laminas-servicemanager-inspector' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasServicemanagerInspector\LaminasServicemanagerInspectorSetProvider::class,
            ],
            'laminas-servicemanager-migration' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasServicemanagerMigration\LaminasServicemanagerMigrationSetProvider::class,
            ],
            'laminas-session' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasSession\LaminasSessionSetProvider::class,
            ],
            'laminas-skeleton-installer' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasSkeletonInstaller\LaminasSkeletonInstallerSetProvider::class,
            ],
            'laminas-soap' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasSoap\LaminasSoapSetProvider::class],
            'laminas-stdlib' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasStdlib\LaminasStdlibSetProvider::class,
            ],
            'laminas-stratigility' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasStratigility\LaminasStratigilitySetProvider::class,
            ],
            'laminas-tag' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasTag\LaminasTagSetProvider::class],
            'laminas-test' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasTest\LaminasTestSetProvider::class],
            'laminas-text' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasText\LaminasTextSetProvider::class],
            'laminas-translator' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasTranslator\LaminasTranslatorSetProvider::class,
            ],
            'laminas-uri' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasUri\LaminasUriSetProvider::class],
            'laminas-validator' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasValidator\LaminasValidatorSetProvider::class,
            ],
            'laminas-view' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasView\LaminasViewSetProvider::class],
            'laminas-xml' => [\Ghostwriter\Revamp\SetProvider\Laminas\LaminasXml\LaminasXmlSetProvider::class],
            'laminas-xml2json' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasXml2Json\LaminasXml2JsonSetProvider::class,
            ],
            'laminas-xmlrpc' => [
                \Ghostwriter\Revamp\SetProvider\Laminas\LaminasXmlrpc\LaminasXmlrpcSetProvider::class,
            ],
        ],
        'mockery' => [
            'mockery' => [\Ghostwriter\Revamp\SetProvider\Mockery\Mockery\MockerySetProvider::class],
        ],
        'mezzio' => [
            'mezzio' => [\Ghostwriter\Revamp\SetProvider\Mezzio\Mezzio\MezzioSetProvider::class],
            'mezzio-authentication' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthentication\MezzioAuthenticationSetProvider::class,
            ],
            'mezzio-authentication-basic' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthenticationBasic\MezzioAuthenticationBasicSetProvider::class,
            ],
            'mezzio-authentication-laminasauthentication' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthenticationLaminasauthentication\MezzioAuthenticationLaminasauthenticationSetProvider::class,
            ],
            'mezzio-authentication-oauth2' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthenticationOauth2\MezzioAuthenticationOauth2SetProvider::class,
            ],
            'mezzio-authentication-session' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthenticationSession\MezzioAuthenticationSessionSetProvider::class,
            ],
            'mezzio-authorization' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthorization\MezzioAuthorizationSetProvider::class,
            ],
            'mezzio-authorization-acl' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthorizationAcl\MezzioAuthorizationAclSetProvider::class,
            ],
            'mezzio-authorization-rbac' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioAuthorizationRbac\MezzioAuthorizationRbacSetProvider::class,
            ],
            'mezzio-cors' => [\Ghostwriter\Revamp\SetProvider\Mezzio\MezzioCors\MezzioCorsSetProvider::class],
            'mezzio-csrf' => [\Ghostwriter\Revamp\SetProvider\Mezzio\MezzioCsrf\MezzioCsrfSetProvider::class],
            'mezzio-fastroute' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioFastroute\MezzioFastrouteSetProvider::class,
            ],
            'mezzio-flash' => [\Ghostwriter\Revamp\SetProvider\Mezzio\MezzioFlash\MezzioFlashSetProvider::class],
            'mezzio-hal' => [\Ghostwriter\Revamp\SetProvider\Mezzio\MezzioHal\MezzioHalSetProvider::class],
            'mezzio-helpers' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioHelpers\MezzioHelpersSetProvider::class,
            ],
            'mezzio-laminasrouter' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioLaminasrouter\MezzioLaminasrouterSetProvider::class,
            ],
            'mezzio-laminasviewrenderer' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioLaminasviewrenderer\MezzioLaminasviewrendererSetProvider::class,
            ],
            'mezzio-migration' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioMigration\MezzioMigrationSetProvider::class,
            ],
            'mezzio-platesrenderer' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioPlatesrenderer\MezzioPlatesrendererSetProvider::class,
            ],
            'mezzio-problem-details' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioProblemDetails\MezzioProblemDetailsSetProvider::class,
            ],
            'mezzio-router' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioRouter\MezzioRouterSetProvider::class,
            ],
            'mezzio-session' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioSession\MezzioSessionSetProvider::class,
            ],
            'mezzio-session-cache' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioSessionCache\MezzioSessionCacheSetProvider::class,
            ],
            'mezzio-session-ext' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioSessionExt\MezzioSessionExtSetProvider::class,
            ],
            'mezzio-skeleton' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioSkeleton\MezzioSkeletonSetProvider::class,
            ],
            'mezzio-swoole' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioSwoole\MezzioSwooleSetProvider::class,
            ],
            'mezzio-template' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioTemplate\MezzioTemplateSetProvider::class,
            ],
            'mezzio-tooling' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioTooling\MezzioToolingSetProvider::class,
            ],
            'mezzio-twigrenderer' => [
                \Ghostwriter\Revamp\SetProvider\Mezzio\MezzioTwigrenderer\MezzioTwigrendererSetProvider::class,
            ],
        ],
        'PHP' => [
            'PHP53' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP53\PHP53SetProvider::class],
            'PHP54' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP54\PHP54SetProvider::class],
            'PHP56' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP56\PHP56SetProvider::class],
            'PHP70' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP70\PHP70SetProvider::class],
            'PHP71' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP71\PHP71SetProvider::class],
            'PHP72' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP72\PHP72SetProvider::class],
            'PHP73' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP73\PHP73SetProvider::class],
            'PHP74' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP74\PHP74SetProvider::class],
            'PHP80' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP80\PHP80SetProvider::class],
            'PHP81' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP81\PHP81SetProvider::class],
            'PHP82' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP82\PHP82SetProvider::class],
            'PHP83' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP83\PHP83SetProvider::class],
            'PHP84' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP84\PHP84SetProvider::class],
            'PHP85' => [\Ghostwriter\Revamp\SetProvider\PHP\PHP85\PHP85SetProvider::class],
        ],
        'phpunit' => [
            'phpunit' => [\Ghostwriter\Revamp\SetProvider\PHPUnit\PHPUnit\PHPUnitSetProvider::class],
        ],
        'psr' => [
            'cache' => [\Ghostwriter\Revamp\SetProvider\Psr\Cache\CacheSetProvider::class],
            'clock' => [\Ghostwriter\Revamp\SetProvider\Psr\Clock\ClockSetProvider::class],
            'container' => [\Ghostwriter\Revamp\SetProvider\Psr\Container\ContainerSetProvider::class],
            'event-dispatcher' => [
                \Ghostwriter\Revamp\SetProvider\Psr\EventDispatcher\EventDispatcherSetProvider::class,
            ],
            'http-client' => [\Ghostwriter\Revamp\SetProvider\Psr\HttpClient\HttpClientSetProvider::class],
            'http-factory' => [\Ghostwriter\Revamp\SetProvider\Psr\HttpFactory\HttpFactorySetProvider::class],
            'http-message' => [\Ghostwriter\Revamp\SetProvider\Psr\HttpMessage\HttpMessageSetProvider::class],
            'http-server-handler' => [
                \Ghostwriter\Revamp\SetProvider\Psr\HttpServerHandler\HttpServerHandlerSetProvider::class,
            ],
            'http-server-middleware' => [
                \Ghostwriter\Revamp\SetProvider\Psr\HttpServerMiddleware\HttpServerMiddlewareSetProvider::class,
            ],
            'link' => [\Ghostwriter\Revamp\SetProvider\Psr\Link\LinkSetProvider::class],
            'log' => [\Ghostwriter\Revamp\SetProvider\Psr\Log\LogSetProvider::class],
            'simple-cache' => [\Ghostwriter\Revamp\SetProvider\Psr\SimpleCache\SimpleCacheSetProvider::class],
        ],
        'sebastian' => [
            'comparator' => [\Ghostwriter\Revamp\SetProvider\Sebastian\Comparator\ComparatorSetProvider::class],
            'diff' => [\Ghostwriter\Revamp\SetProvider\Sebastian\Diff\DiffSetProvider::class],
            'exporter' => [\Ghostwriter\Revamp\SetProvider\Sebastian\Exporter\ExporterSetProvider::class],
        ],
        'vimeo' => [
            'psalm' => [\Ghostwriter\Revamp\SetProvider\Vimeo\Psalm\PsalmSetProvider::class],
        ],
        'webmozart' => [
            'assert' => [\Ghostwriter\Revamp\SetProvider\Webmozart\Assert\AssertSetProvider::class],
        ],
    ];

    public const array SETS = [
        'Mezzio' => [
            'mezzio/mezzio' => ['3.20', '4.0'],
            'mezzio/mezzio-swoole' => [],
            'mezzio/mezzio-template' => ['2.11', '3.0'],
            'mezzio/mezzio-router' => ['3.18', '4.0'],
            'mezzio/mezzio-helpers' => ['5.17', '6.0'],
        ],
        'Laminas' => [
            'laminas/laminas-diactoros' => ['3.5', '4.0'],
            'laminas/laminas-mvc' => ['3.8', '4.0'],
            'laminas/laminas-component-installer' => ['3.5', '4.0'],
        ],
        'Mockery' => [
            'mockery/mockery' => ['1.6', '2.0'],
        ],
        'PHPUnit' => [
            'phpunit/phpunit' => ['9.5', '10.0', '11.0', '12.0'],
        ],
        'Revamp' => [
            'ghostwriter/revamp' => [],
        ],
    ];

    public function __construct(
        private ContainerInterface $container,
    ) {

    }

    /**
     * @return list<SetInterface>
     */
    #[\Override]
    public function provide(): array
    {
        static $composerTriggeredSets = [];

        if ($composerTriggeredSets !== []) {
            return $composerTriggeredSets;
        }

        $configPath = \dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;

        foreach (self::SETS as $groupName => $packages) {
            foreach ($packages as $packageName => $versions) {
                $composerTriggeredSets[] = new ComposerTriggeredSet(
                    groupName: $groupName,
                    packageName: $packageName,
                    version: '*',
                    setFilePath: $configPath . $packageName . '.php',
                );

                foreach ($versions as $version) {
                    $composerTriggeredSets[] = new ComposerTriggeredSet(
                        groupName: $groupName,
                        packageName: $packageName,
                        version: $version,
                        setFilePath: $configPath . $packageName . '-' . $version . '.php',
                    );
                }
            }
        }

        foreach (self::PROVIDERS as $vendor => $packages) {
            foreach ($packages as $packageName => $providerClasses) {
                foreach ($providerClasses as $providerClass) {
                    $provider = $this->container->get($providerClass);
                    foreach ($provider->provide() as $set) {
                        $composerTriggeredSets[] = $set;
                    }
                }
            }
        }

        return $composerTriggeredSets;
    }
}
