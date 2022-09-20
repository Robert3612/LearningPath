<?php

declare(strict_types=1);

/**
 * @author Daniel Weise <daniel.weise@concepts-and-training.de>
 */
class ilLearningPathWaitingList extends ilWaitingList
{
    public function addToList($usr_id)
    {
        global $DIC;

        $app_event_handler = $DIC->event();
        $log = $DIC->logger();

        if (!parent::addToList($usr_id)) {
            return false;
        }

        $log()->lso()->info('Raise new event: Modules/LearningSerquence addToList.');
        $app_event_handler->raise(
            "Modules/LearningPath",
            'addToWaitingList',
            array(
                'obj_id' => $this->getObjId(),
                'usr_id' => $usr_id
            )
        );

        return true;
    }
}