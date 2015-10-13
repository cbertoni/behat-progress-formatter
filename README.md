# Behat Progress Formatter 
On Behat `Progress` format is several times faster when running tests than `Pretty` format. But `Progress` format have two issues:
- It doesn't print the information on the tests failed (just prints an `F`) and when you run thousands of tests you have to wait until the end to know what the problem is.
- It doesn't print the failed scenarios which is a real problem when you have just 1 failed scenario over thounsands of tests and you don't know which is.

This Behat extension adds a custom `Progress` formatter which prints the list of failed scenarios at the end of the output and prints each scenario at the moment of the failure (you can re-run it to know what the problem is).

## Intallation
- In your `composer.json` file add
```json
{
    "require-dev": {
        "cbertoni/behat-progress-formatter" : "dev-master"
    },
    "repositories": [
        {
            "url"  : "git@github.com:cbertoni/behat-progress-formatter.git",
            "type" : "git"
        }
    ]
}
```
- In your `behat.yml` file add
```yml
default:
    extensions:
        cbertoni\BehatProgressFormatter\BehatProgressFormatterExtension:
```
- Run the tests using the option `--format progress`
- You will see an output like this:
```
./vendor/bin/behat --profile test --format progress ./tests/integration/features/StreamsMediaByOrder.feature
Failed loading /usr/local/Cellar/php55/5.5.23/lib/php/extensions/no-debug-non-zts-20121212/xdebug.so:  dlopen(/usr/local/Cellar/php55/5.5.23/lib/php/extensions/no-debug-non-zts-20121212/xdebug.so, 9): image not found
..tests/integration/features/StreamsMediaByOrder.feature:8 100
..tests/integration/features/StreamsMediaByOrder.feature:285 200
..tests/integration/features/StreamsMediaByOrder.feature:572 300
..tests/integration/features/StreamsMediaByOrder.feature:689 400
..tests/integration/features/StreamsMediaByOrder.feature:824 500
..tests/integration/features/StreamsMediaByOrder.feature:970 600
..tests/integration/features/StreamsMediaByOrder.feature:1105 700
..tests/integration/features/StreamsMediaByOrder.feature:1318.....................................................tests/integration/features/StreamsMediaByOrder.feature:1386.. 800
................................................

--- Failed scenarios:

    tests/integration/features/StreamsMediaByOrder.feature:8
    tests/integration/features/StreamsMediaByOrder.feature:285
    tests/integration/features/StreamsMediaByOrder.feature:572
    tests/integration/features/StreamsMediaByOrder.feature:689
    tests/integration/features/StreamsMediaByOrder.feature:824
    tests/integration/features/StreamsMediaByOrder.feature:970
    tests/integration/features/StreamsMediaByOrder.feature:1105
    tests/integration/features/StreamsMediaByOrder.feature:1318
    tests/integration/features/StreamsMediaByOrder.feature:1386

29 scenarios (20 passed, 9 failed)
1419 steps (119 passed, 9 failed, 1291 skipped)
0m6.23s (13.45Mb)
```
