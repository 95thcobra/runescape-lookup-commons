# RuneScape lookup commons

#### A PHP library containing RuneScape lookup components.

[![CircleCI](https://circleci.com/gh/villermen/runescape-lookup-commons.svg?style=svg)](https://circleci.com/gh/villermen/runescape-lookup-commons)

## Features

- Fetch player current and old school high scores.
- Fetch player activity feeds.
- Compare high scores.
- Get combat levels and virtual skill levels.
- Fetch from RuneMetrics with high scores and adventurer's log as fallbacks.

## Usage

For looking up player related matters, simply construct a `Player` object and use its methods:

```php
use Villermen\RuneScape\Player;
use Villermen\RuneScape\Skill;

$player = new Player("VILLERMEN");

$highScore = $player->getSkillHighScore();
echo $highScore->getSkill(Skill::SKILL_FARMING)->getLevel(true);
// 107

$oldSchoolHighScore = $player->getOldSchoolSkillHighScore();
echo $oldSchoolHighScore->getCombatLevel();
// 69

$comparison = $highScore->compareTo($oldSchoolHighScore);
echo $comparison->getSkill(Skill::SKILL_ATTACK)->getLevelDifference(true);
// 39

// These should return instantly if $highScore was successfully obtained from RuneMetrics
echo $player->fixName()->getName();
// "Villermen"

echo $player->getActivityFeed()->getItems()[0]->getTitle();
// "Quest complete: Evil Dave's big day out"
```

Internally, `Player` uses a `PlayerDataFetcher` object to fetch and cache details.
A single `PlayerDataFetcher` can be shared across all player objects by passing it in their constructors or by setting it afterward.

## Installation

`composer require villermen/runescape-lookup-commons`
