#!/usr/bin/perl

# Get the version type. (major, minor, patch)

# Get the git status.
my $status = `git status`;

# Match all the modified files.
my @files  = ($status =~ m/modified:\s+(.+)/g);

# Loop through the files.
foreach $file (@files) {

    # Look for the current version number.
    # Update the file depending on the version type.
    # Do a find an replace on the file.
}
