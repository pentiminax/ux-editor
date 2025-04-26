<?php

namespace Pentiminax\UX\Editor;

use Symfony\Component\AssetMapper\AssetMapperInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class EditorBundle extends AbstractBundle
{
    /**
     * @param array<string, mixed> $config
     */
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->services()
            ->set('editor.twig_extension', Twig\EditorExtension::class)
            ->arg(0, new Reference('stimulus.helper'))
            ->tag('twig.extension')
            ->private();
    }

    public function prependExtension(ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        if (!$this->isAssetMapperAvailable($builder)) {
            return;
        }

        $builder->prependExtensionConfig('framework', [
            'asset_mapper' => [
                'paths' => [
                    __DIR__.'/../assets/dist' => '@pentiminax/ux-editor',
                ],
            ],
        ]);
    }

    private function isAssetMapperAvailable(ContainerBuilder $builder): bool
    {
        if (!interface_exists(AssetMapperInterface::class)) {
            return false;
        }

        $bundlesMetadata = $builder->getParameter('kernel.bundles_metadata');
        if (
            !is_array($bundlesMetadata)
            || !is_array($bundlesMetadata['FrameworkBundle'])
            || !isset($bundlesMetadata['FrameworkBundle']['path'])
            || !is_string($bundlesMetadata['FrameworkBundle']['path'])
        ) {
            return false;
        }

        $bundlePath = $bundlesMetadata['FrameworkBundle']['path'];

        return is_file($bundlePath.'/Resources/config/asset_mapper.php');
    }
}