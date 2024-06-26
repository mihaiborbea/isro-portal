<?php

namespace App\Nova\Settings;

use AlexAzartsev\Heroicon\Heroicon;
use Alexwenzel\DependencyContainer\DependencyContainer;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Outl1ne\NovaSettings\NovaSettings;
use Timothyasp\Color\Color;
use Whitecube\NovaFlexibleContent\Flexible;

class Widgets
{
    public function __construct()
    {
        return [
            NovaSettings::addSettingsFields([
                new Tabs('Sidebar Widgets', [

                    new Tab('Show / Off', [
                        Boolean::make('Server info Enable', 'server_info_widget_enable'),
                        Boolean::make('Server Times Enable', 'server_times_widget_enable'),
                        Boolean::make('Fortress War Enable', 'server_fortress_widget_enable'),
                        Boolean::make('Unique History Enable', 'server_unique_widget_enable'),
                        Boolean::make('Global History Enable', 'server_global_widget_enable'),
                        Boolean::make('Discord Widget Enable', 'discord_widget_enable'),

                    ]),

                    new Tab('Server Info', [
                        Flexible::make('Server info', 'server_info')
                            ->addLayout('Server Info', 'server_info', [
                                Heroicon::make('Icon', 'server_info_icon'),
                                Text::make('Title', 'server_info_title'),
                                Text::make('Value', 'server_info_value'),
                            ]),
                    ]),

                    new Tab('Server Times', [
                        Flexible::make('Server Times', 'server_times')
                            ->addLayout('Server Times', 'server_times', [
                                Heroicon::make('Icon', 'server_times_icon'),
                                Text::make('Title', 'server_times_title'),
                                Text::make('Value', 'server_times_value'),
                            ]),
                    ]),

                    new Tab('Discord Widget', [
                        DependencyContainer::make([
                            Text::make('Discord Server ID', 'discord_widget_id'),
                        ])->dependsOn('discord_widget_enable', true),
                    ]),

                ]),
            ], [], 'Widgets'),
        ];
    }
}
