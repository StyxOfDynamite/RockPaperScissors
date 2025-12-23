# Rock / Paper / Scissors (PHP 8.3)

The core domain now separates moves from the win/lose rules. `Move` implementations only describe their identity (`name()`), while a `RuleSet` and `MatchupResolver` decide outcomes. This keeps existing moves closed to modification when you add new ones.

Basic usage:
```
use StyxOfDynamite\RockPaperScissors\Moves\Rock;
use StyxOfDynamite\RockPaperScissors\Moves\Paper;
use StyxOfDynamite\RockPaperScissors\Rules\MatchupResolver;
use StyxOfDynamite\RockPaperScissors\Rules\RuleSet;

$resolver = new MatchupResolver(RuleSet::standard());

$rock = new Rock();
$paper = new Paper();

$result = $resolver->resolve($rock, $paper); // -1 (Paper beats Rock)
```

Quick CLI demo:
```
php bin/play.php rock scissors
php bin/play.php paper rock
php bin/play.php rock rock    # tie
```

#### Adding a new move
1. Create a class under `src/Moves/` extending `StyxOfDynamite\RockPaperScissors\Move` that returns its `name()`.
2. Register it in the `$registry` array inside `bin/play.php` so the CLI can instantiate it by name.
3. Add rules to the `RuleSet` (e.g. extend the map passed to `RuleSet::fromBeatsMap()` or compose a new instance) without touching existing move classes.
4. (Optional) Add tests for the new rules.

## Conclusion

This repository serves as a foundation for creating a PHP package, making it easier for you to develop, test, and maintain your projects. Feel free to modify the code and templates to suit your needs!

If you have any questions or suggestions, feel free to open an issue in this repository.

Happy coding!
