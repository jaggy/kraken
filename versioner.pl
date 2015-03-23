#!/usr/bin/perl

my $status = `git status`;
my @files  = ($status =~ m/modified:\s+(.+)/g);

foreach $file (@files) {
}
