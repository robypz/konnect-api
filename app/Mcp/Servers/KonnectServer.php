<?php

namespace App\Mcp\Servers;

use Laravel\Mcp\Server;

class KonnectServer extends Server
{
    public string $serverName = 'Konnect Server';

    public string $serverVersion = '0.0.1';

    public string $instructions = 'Example instructions for LLMs connecting to this MCP server.';

    public array $tools = [
        // ExampleTool::class,
    ];

    public array $resources = [
        // ExampleResource::class,
    ];

    public array $prompts = [
        // ExamplePrompt::class,
    ];
}
