<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use Yii;
use yii\helpers\Console;

/**
 * Class MemController
 *
 * @package app\commands
 */
class MemController extends Controller
{

    /**
     * @param string $key
     * @param string $data
     *
     * @return string
     */
    public function actionSet($key, $data)
    {
        $cache = Yii::$app->cache;
        $cache->set($key, $data);

        return Console::output(
            Console::ansiFormat(
                'Key saved!',
                [Console::FG_BLACK, Console::BG_YELLOW, Console::BOLD]
            )
        );
    }

    /**
     * @param string $key
     *
     * @return string
     */
    public function actionGet($key)
    {
        $cache = Yii::$app->cache;
        $data = $cache->get($key);

        if ($data !== false) {
            return Console::output($data);
        }

        return Console::output(
            Console::ansiFormat(
                'Nothing',
                [Console::FG_BLACK, Console::BG_YELLOW, Console::BOLD]
            )
        );
    }

    /**
     * @param string $key
     *
     * @return string
     */
    public function actionDelete($key)
    {
        $cache = Yii::$app->cache;
        $cache->delete($key);

        return Console::output(
            Console::ansiFormat(
                'Key deleted!',
                [Console::FG_BLACK, Console::BG_RED, Console::BOLD]
            )
        );
    }
}
