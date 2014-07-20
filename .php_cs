<?php

    $finder = Symfony\CS\Finder\DefaultFinder::create()
        ->exclude(__DIR__.'/doc')
        ->exclude(__DIR__.'/vendor')
        ->in(__DIR__)
    ;
 
    return Symfony\CS\Config\Config::create()
        ->fixers(array('Psr2Fixer'))
        ->finder($finder)
    ;
