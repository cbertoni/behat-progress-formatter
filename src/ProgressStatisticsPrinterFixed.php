<?php

/*
 * This file is part of the Behat.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace cbertoni\BehatProgressFormatter;

use Behat\Behat\Output\Node\Printer\CounterPrinter;
use Behat\Behat\Output\Node\Printer\ListPrinter;
use Behat\Behat\Output\Node\Printer\StatisticsPrinter;
use Behat\Behat\Output\Statistics\Statistics;
use Behat\Testwork\Output\Formatter;
use Behat\Testwork\Tester\Result\TestResult;

/**
 * Behat progress statistics printer.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
final class ProgressStatisticsPrinterFixed implements StatisticsPrinter
{
    /**
     * @var CounterPrinter
     */
    private $counterPrinter;
    /**
     * @var ListPrinter
     */
    private $listPrinter;

    /**
     * Initializes printer.
     *
     * @param CounterPrinter $counterPrinter
     * @param ListPrinter    $listPrinter
     */
    public function __construct(CounterPrinter $counterPrinter, ListPrinter $listPrinter)
    {
        $this->counterPrinter = $counterPrinter;
        $this->listPrinter = $listPrinter;
    }

    /**
     * {@inheritdoc}
     */
    public function printStatistics(Formatter $formatter, Statistics $statistics)
    {
        $printer = $formatter->getOutputPrinter();

        $printer->writeln();
        $printer->writeln();

        $scenarioStats = $statistics->getFailedScenarios();
        $this->listPrinter->printScenariosList($printer, 'failed_scenarios_title', TestResult::FAILED, $scenarioStats);

        $this->counterPrinter->printCounters($printer, 'scenarios_count', $statistics->getScenarioStatCounts());
        $this->counterPrinter->printCounters($printer, 'steps_count', $statistics->getStepStatCounts());

        if ($formatter->getParameter('timer')) {
            $timer = $statistics->getTimer();
            $memory = $statistics->getMemory();

            $formatter->getOutputPrinter()->writeln(sprintf('%s (%s)', $timer, $memory));
        }
    }
}
