BSON_CURRENT_FILE=${srcdir}/VERSION_CURRENT
BSON_VERSION=$(cat $BSON_CURRENT_FILE)
# Ensure newline for "cut" implementations that need it, e.g. HP-UX.
BSON_MAJOR_VERSION=$( (cat $BSON_CURRENT_FILE; echo) | cut -d- -f1 | cut -d. -f1 )
BSON_MINOR_VERSION=$( (cat $BSON_CURRENT_FILE; echo) | cut -d- -f1 | cut -d. -f2 )
BSON_MICRO_VERSION=$( (cat $BSON_CURRENT_FILE; echo) | cut -d- -f1 | cut -d. -f3 )
BSON_PRERELEASE_VERSION=$(cut -s -d- -f2 $BSON_CURRENT_FILE)
AC_SUBST(BSON_VERSION)
AC_SUBST(BSON_MAJOR_VERSION)
AC_SUBST(BSON_MINOR_VERSION)
AC_SUBST(BSON_MICRO_VERSION)
AC_SUBST(BSON_PRERELEASE_VERSION)

BSON_RELEASED_FILE=${srcdir}/VERSION_RELEASED
BSON_RELEASED_VERSION=$(cat $BSON_RELEASED_FILE)
BSON_RELEASED_MAJOR_VERSION=$(cut -d- -f1 $BSON_RELEASED_FILE | cut -d. -f1)
BSON_RELEASED_MINOR_VERSION=$(cut -d- -f1 $BSON_RELEASED_FILE | cut -d. -f2)
BSON_RELEASED_MICRO_VERSION=$(cut -d- -f1 $BSON_RELEASED_FILE | cut -d. -f3)
BSON_RELEASED_PRERELEASE_VERSION=$(cut -s -d- -f2 $BSON_RELEASED_FILE)
AC_SUBST(BSON_RELEASED_VERSION)
AC_SUBST(BSON_RELEASED_MAJOR_VERSION)
AC_SUBST(BSON_RELEASED_MINOR_VERSION)
AC_SUBST(BSON_RELEASED_MICRO_VERSION)
AC_SUBST(BSON_RELEASED_PRERELEASE_VERSION)

AC_MSG_NOTICE([Current version (from VERSION_CURRENT file): $BSON_VERSION])

if test "x$BSON_RELEASED_PRERELEASE_VERSION" != "x"; then
   AC_ERROR([RELEASED_VERSION file has prerelease version $BSON_RELEASED_VERSION])
fi

if test "x$BSON_VERSION" != "x$BSON_RELEASED_VERSION"; then
   AC_MSG_NOTICE([Most recent release (from VERSION_RELEASED file): $BSON_RELEASED_VERSION])
   if test "x$BSON_PRERELEASE_VERSION" = "x"; then
      AC_ERROR([Current version ($BSON_PRERELEASE_VERSION) must be a prerelease (with "-dev", "-beta", etc.) or equal to previous release])
   fi
fi

