# jdorm
An ORM for PHP. Because I'm sick of Propel.

# Status

Development. This project is not yet in a state where it can be used at all.

# Usage

```
$book = \BookQuery::create()->findOneByName("A Tale of Two Cities");
$author = $book->getAuthor();
$other_books = $author->getBooks(
    \BookQuery::create()->filterById($book->getId(), Criteria::NOT)
);
```

# Key Aims

* To be compatible with most Propel 2 projects
* To support NoSQL-style queries, including recursive conditions which should
  only affect which top-level objects are produced
* Not to get in the way when you do something mildly complicated like on-demand
  hydration with a 1:many relationship in the SELECT
* To bulk-INSERT whenever possible when saving a collection and in general avoid
  many-query scenarios where a single query will do (excluding any pathological
  cases).
* To reduce the chance of cryptic errors, particularly "Cannot commit because a
  nested transaction was rolled back"

# What to Expect Here

* There's an XML schema in a familiar forms which at least supports the filename
  "schema.xml"
* You can do the "diff" and "migrate" actions you already know and they
  shouldn't produce a meaningfully different database structure
* You can do the "build" action to generate class files which go in a particular
  directory, which can be configured as "generated-classes"
* You have *query* classes which have `filterBy<name>(...)` methods in fluent
  style, and `find()` to return a resultset
* Resultsets may be iterated but are not arrays.
* In the general case, objects are returned of a named type, and on those you
  can call `get<name>()` and `set<name>()`, as well as `save()` and `delete()`.

# What Not to Expect Here

There are a few Propel2 behaviours which are awkward at best, and compatibility
with those will only be retained to the extent that usage is extremely common;
in addition there are a great many features which, while useful, fall so far out
of the range of common use that they aren't worth retaining.

* Support for back-ends other than SQLite and MySQL/MariaDB. Others can just go
  into standalone drivers.
* The instance pool: This just creates a mess if you ever clone an object. While
  cloning remains discouraged, there's no excuse at all for a "fresh select"
  returning the wrong version of an object.
* Implicit use of LIKE in `filterBy<name>()`: if you provide something which
  happens to be consistent with a LIKE pattern, it won't use LIKE unless you
  explicitly ask for it.
* Multi-type functions: the type of some functions, like `find()`, is dependent
  on the code that's preceeded or other contextual hints - wrecking static
  analysis and human understanding of the code. `find()` remains, but you'll
  have explicit options for a resultset or array, and cases like
  `getCreatedAt("c")` will use a clearly separate method name.
* The name "propel" for the command-line tool.