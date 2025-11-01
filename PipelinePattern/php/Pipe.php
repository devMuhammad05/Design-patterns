<?php

interface Pipe
{
    public function handle($payload, Closure $next);
}


class TrimPipe implements Pipe
{
    public function handle($payload, Closure $next)
    {
        $payload = trim($payload);

        // Pass modified payload to next pipe
        return $next($payload);
    }
}

class UppercasePipe implements Pipe
{
    public function handle($payload, Closure $next)
    {
        $payload = strtoupper($payload);
        return $next($payload);
    }
}

function pipeline(array $pipes, string $payload)
{
    $next = fn($p) => $p;

    foreach(array_reverse($pipes) as $pipe){
        $next = fn($p) => $pipe->handle($p, $next);
    }

    return $next($payload);
}


$result = pipeline([new TrimPipe, new UppercasePipe], "  hello   ");
print_r($result);