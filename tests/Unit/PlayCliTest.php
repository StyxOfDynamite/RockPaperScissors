<?php

declare(strict_types=1);

$script = \dirname(__DIR__, 2) . '/bin/play.php';

test('play script reports winner', function () use ($script): void {
    $command = sprintf('php %s rock scissors', escapeshellarg($script));
    exec($command, $output, $exitCode);

    expect($exitCode)->toBe(0);
    expect(implode("\n", $output))->toContain('Rock beats Scissors => Rock wins');
});

test('play script reports tie', function () use ($script): void {
    $command = sprintf('php %s rock rock', escapeshellarg($script));
    exec($command, $output, $exitCode);

    expect($exitCode)->toBe(0);
    expect(implode("\n", $output))->toContain('Rock vs Rock => tie');
});

