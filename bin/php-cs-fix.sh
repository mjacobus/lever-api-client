
#!/bin/bash

TARGET=$1
EXTRA_OPTIONS=''

if (( $# > 1 )); then
  EXTRA_OPTIONS='-v --diff --dry-run'
fi

./vendor/bin/php-cs-fixer fix $TARGET --level=symfony --fixers=-concat_without_spaces,-return,unused_use,align_double_arrow,phpdoc_indent,-phpdoc_short_description $EXTRA_OPTIONS
