<?php

namespace Botble\IncasariConnector\Providers;

use Botble\Base\Traits\LoadAndPublishDataTrait;
use Event;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\ServiceProvider;

class IncasariConnectorServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->setNamespace('plugins/incasari-connector')
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssets()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {           

                dashboard_menu()
                ->registerItem([
                    'id'          => 'cms-plugin-incasari-connector',
                    'priority'    => 11,
                    'parent_id'   => null,
                    'name'        => 'plugins/incasari-connector::incasari-connector.name',
                    'icon'        => 'incasari-icon',
                    'url'         => '',
                    'permissions' => ['settings.options'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugin-incasari-diferente',
                    'priority'    => 12,
                    'parent_id'   => 'cms-plugin-incasari-connector',
                    'name'        => 'Diferente',
                    'icon'        => '',
                    'url'         => route('incasari-connector'),
                    'permissions' => ['settings.options'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugin-incasari-emag',
                    'priority'    => 13,
                    'parent_id'   => 'cms-plugin-incasari-connector',
                    'name'        => 'Emag',
                    'icon'        => '',
                    'url'         => route('incasari-connector.emag'),
                    'permissions' => ['settings.options'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugin-incasari-neomanager',
                    'priority'    => 14,
                    'parent_id'   => 'cms-plugin-incasari-connector',
                    'name'        => 'Neomanager',
                    'icon'        => '',
                    'url'         => route('incasari-connector.neomanager'),
                    'permissions' => ['settings.options'],
                ]);        
   
        });
    }
}
