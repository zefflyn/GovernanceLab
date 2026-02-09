<?php
/**
 * Main entry point for Governance
 */

require_once __DIR__ . '/src/Governance.php';

use Governance\Governance;

function main() {
    $options = getopt('v::i:o:', ['verbose::', 'input:', 'output:']);
    
    $config = [
        'verbose' => isset($options['v']) || isset($options['verbose']),
        'input' => $options['i'] ?? $options['input'] ?? null,
        'output' => $options['o'] ?? $options['output'] ?? null
    ];

    try {
        $app = new Governance($config);
        
        if ($config['verbose']) {
            echo "Starting Governance processing...\n";
        }

        $result = $app->execute();
        
        if ($config['output']) {
            echo "Results saved to: " . $config['output'] . "\n";
        }

        echo "✅ Processing completed successfully\n";
        exit(0);
    } catch (Exception $e) {
        echo "❌ Error: " . $e->getMessage() . "\n";
        if ($config['verbose']) {
            echo $e->getTraceAsString() . "\n";
        }
        exit(1);
    }
}

if (basename(__FILE__) === basename($_SERVER['PHP_SELF'])) {
    main();
}
