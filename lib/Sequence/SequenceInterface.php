<?php namespace Sequence; 

interface SequenceInterface
{
    public function getNumberAt($x);

    public function getIndexOf($n);

    public function next();

    public function createSequenceTo($n);

    public function createSequenceOfLength($n);

    public function getSequence();
} 