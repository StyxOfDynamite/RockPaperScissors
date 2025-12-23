# Rock / Paper / Scissors (PHP 8.3)

The core domain is modeled with a `Move` base class and concrete moves that implement a `beats` interface. A `compare` helper returns `1` (win), `0` (tie), or `-1` (loss).

Basic OOP usage:
```
use StyxOfDynamite\RockPaperScissors\Moves\Rock;
use StyxOfDynamite\RockPaperScissors\Moves\Paper;

$rock = new Rock();
$paper = new Paper();

$result = $rock->compare($paper); // -1 (Paper beats Rock)
```

Quick CLI demo:
```
php bin/play.php rock scissors
php bin/play.php paper rock
php bin/play.php rock rock    # tie
```

#### Adding a new move
1. Create a class under `src/Moves/` extending `StyxOfDynamite\RockPaperScissors\Move` and implement `name()` plus `beats(Move $other): bool`.
2. Register it in the `$registry` array inside `bin/play.php` so the CLI can instantiate it by name.
3. (Optional) Add tests for the new rules.

## Conclusion

This repository serves as a foundation for creating a PHP package, making it easier for you to develop, test, and maintain your projects. Feel free to modify the code and templates to suit your needs!

If you have any questions or suggestions, feel free to open an issue in this repository.

Happy coding!
