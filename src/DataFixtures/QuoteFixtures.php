<?php

namespace App\DataFixtures;

use App\Entity\Quote;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class QuoteFixtures extends Fixture
{
        const QUOTES = [
            ["name" => "Learn to value yourself, which means: fight for your happiness.",
            "author" => "Ayn Rand"],
            ["name" => "The true secret of happiness lies in the taking a genuine interest in all the details of daily life.",
            "author" => "William Morris"],
            ["name" => "The greatest happiness you can have is knowing that you do not necessarily require happiness.",
            "author" => " William Saroyan"],
            ["name" => "People should find happiness in the little things, like family.",
            "author" => "Amanda Bynes"],
            ["name" => "All happiness or unhappiness solely depends upon the quality of the object to which we are attached by love.",
            "author" => "Baruch Spinoza"],
            ["name" => "Happiness is not an ideal of reason, but of imagination.",
            "author" => "Immanuel Kant"],
            ["name" => "To be without some of the things you want is an indispensable part of happiness.",
            "author" => "Bertrand Russell"],
            ["name" => "The secret of happiness is freedom, the secret of freedom is courage.",
            "author" => "Carrie Jones"],
            ["name" => "The only way to find true happiness is to risk being completely cut open.",
            "author" => "Chuck Palahniuk"],
            ["name" => "It isn’t what you have or who you are or where you are or what you are doing that makes you happy or unhappy. It is what you think about it.",
            "author" => "Dale Carnegie"],
            ["name" => "We can’t control the world. We can only (barely) control our own reactions to it. Happiness is largely a choice, not a right or entitlement.",
            "author" => "David C. Hill"],
            ["name" => "Happiness is the interval between periods of unhappiness.",
            "author" => "Don Marquis"],
            ["name" => "The world is full of people looking for spectacular happiness while they snub contentment.",
            "author" => "Doug Larson"],
            ["name" => "If only we’d stop trying to be happy we could have a pretty good time.",
            "author" => "Edith Wharton"],
            ["name" => "There can be no happiness if the things we believe in are different from the things we do.",
            "author" => "Freya Stark"],
        ];

    public function load(ObjectManager $manager)
    {
       foreach (self::QUOTES as $sentence) {
           $quote = new Quote();
           $quote->setName($sentence['name']);
           $quote->setAuthor($sentence['author']);
           $manager->persist($quote);
       }
       $manager->flush();
    }
}
