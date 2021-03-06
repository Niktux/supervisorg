<?php

namespace Supervisorg\Services\XmlRPC\Clients;

use Supervisorg\Services\XmlRPC\Client;

class Zend implements Client
{
    private
        $client;

    public function __construct($host)
    {
        $this->client = new \Zend\XmlRpc\Client($host);
    }

    public function getProcessList()
    {
        return $this->client->call('supervisor.getAllProcessInfo');
    }

    public function stopProcess($process)
    {
        return $this->client->call('supervisor.stopProcess', [$process]);
    }

    public function startProcess($process)
    {
        return $this->client->call('supervisor.startProcess', [$process]);
    }

    public function readStdErr($process)
    {
        return $this->client->call('supervisor.readProcessStderrLog', array($process, -1000, 0));
    }
}
