<?php declare(strict_types=1);

use Pimple\Container;
use ILIAS\GlobalScreen\ScreenContext\ScreenContext;

/**
 * @author Nils Haagen <nils.haagen@concepts-and-training.de>
 */
class ilLSDI extends Container
{
    public function init(ArrayAccess $dic)
    {
        $this["db.filesystem"] = function ($c) : ilLearningPathFilesystem {
            return new ilLearningPathFilesystem();
        };

        $this["db.settings"] = function ($c) use ($dic) : ilLearningPathSettingsDB {
            return new ilLearningPathSettingsDB(
                $dic["ilDB"],
                $c["db.filesystem"]
            );
        };

        $this["db.activation"] = function ($c) use ($dic) : ilLearningPathActivationDB {
            return new ilLearningPathActivationDB($dic["ilDB"]);
        };

        $this["db.states"] = function ($c) use ($dic) : ilLSStateDB {
            return new ilLSStateDB($dic["ilDB"]);
        };

        $this["db.postconditions"] = function ($c) use ($dic) : ilLSPostConditionDB {
            return new ilLSPostConditionDB($dic["ilDB"]);
        };

        $this["gs.current_context"] = function ($c) use ($dic) : ScreenContext {
            return $dic->globalScreen()->tool()->context()->current();
        };
    }
}