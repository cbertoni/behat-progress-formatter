# behat-progress-formatter 
Adds a custom progress formatter which prints the list of failed files at the end of the output.

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
..F------------------------------------------------------------------- 70
---------------------------------------------------------------------- 140
---------------------------------------------------------------------- 210
------------------------------------------------------------..F------- 280
---------------------------------------------------------------------- 350
---------------------------------------------------------------------- 420
---------------------------------------------------------------------- 490
--------------------------------------------------..F----------------- 560
---------------------------------------------------------------------- 630
------------------------..F------------------------------------------- 700
---------------------------------------------------------------------- 770
----------------..F--------------------------------------------------- 840
---------------------------------------------------------------------- 910
-------------------..F------------------------------------------------ 980
---------------------------------------------------------------------- 1050
-----------..F-------------------------------------------------------- 1120
---------------------------------------------------------------------- 1190
---------------------------------------------------------------------- 1260
-----------..F----------------------------------------................ 1330
.....................................F-............................... 1400
...................

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
0m7.73s (13.44Mb)
```
