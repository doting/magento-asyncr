<?php

class Doting_Asyncr_Model_Job {

    // string
    private $name;

    // array
    private $payload;

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setPayload(array $payload) {
        $this->payload = $payload;
        return $this;
    }

    public function __destruct() {
        $now = time();
        Mage::getModel('cron/schedule')
            ->setJobCode($this->name)
            ->setStatus(Mage_Cron_Model_Schedule::STATUS_PENDING)
            ->setPayload(json_encode($this->payload))
            ->setCreatedAt(date('Y-m-d H:i:s', $now))
            ->setScheduledAt(date('Y-m-d H:i:s', $now + 5))
            ->save();
    }

}
