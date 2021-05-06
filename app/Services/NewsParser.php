<?php


namespace App\Services;


class NewsParser
{
    public function run(string $source)
    {
        $xml = \XmlParser::load($source);
        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'channel_description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description]']
        ]);
        return $data;
    }
}
