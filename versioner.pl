#!/usr/bin/perl
use strict;
use warnings;

# Get the version type. (major, minor, patch)
my $type = $ARGV[0];

# Index reference.
my %indexes = ('major' => 0, 'minor' => 1, 'patch' => 2);
my $index   = $indexes{$type}; # Set the index to version.

# Get the git status.
my $status = `git status`;

# Match all the modified files.
my @files  = ($status =~ m/modified:\s+(.+)/g);

# Loop through the files.
foreach my $file (@files) {

    # Open the file
    open my $handle, '<', $file;
    my $content = do { local $/; <$handle> };

    # Look for the current version number.
    my @annotation = ($content =~ m/version\s+Release:\s?(.+)/g);
    my $version    = shift(@annotation);

    # Update the file depending on the version type.
    my @digits = split /\./, $version;
    $digits[$index]++;

    if ($type eq 'major') {
        $digits[1] = 0;
        $digits[2] = 0;
    } elsif ($type eq 'minor') {
        $digits[2] = 0;
    }

    my $update = join '.', @digits;

    # Do a find an replace on the file.
    $content =~ s/Release: $version/Release: $update/g;

    open $handle, '>', $file;
    print $handle $content;
    close $handle;
}
