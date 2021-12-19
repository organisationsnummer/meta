# meta

Organization meta

## Implementations

| Package | Pkg Version | Spec Version | Status | Maintainer |
| ------- | ----------- | ------------ | ------ | ---------- |

## License Specification

We use the [MIT license](https://opensource.org/licenses/MIT) for all packages and the copyright row should look like this:

```
Copyright (c) Organisationsnummer and Contributors
```

### Input value format

Dash or plus should be optional.

```
NNNNNN-NNNN
NNNNNNNNNN
```

Personnummer should also be a valid organisationsnummer.

## Package Specification (v1)

### Class

The package should include a class that includes a constructor and parse on new instance. The constructor may be different depending on language.

```js
class Organisationsnummer {
    public function __construct(string)
}
```

### Format

Output for short `format` method

```
YYMMDD-XXXX
NNNNNN-NNNN
```

### Long format

Output for long `format` method

```
NNNNNNNNNN
```

### Valid

The `valid` function can be a function or a static method on the class depending on language.

### Error handling

All methods except for `valid` should throw an exception or return an error as a second return value. Error handling may be different depending on language. The exception/error class should be prefixed with `Organisationsnummer`

### Pseudo-interface

```js
interface Organisationsnummer {
    public function __construct(string input);
    public function format(boolean longFormat) : string;
    public function getType() : string;
}

function valid(string input) {
    try {
       parse(input)
       return true
    } catch (OrganisationsnummerException) {
        return false
    }
}

function parse(string input) {
    return new Organisationsnummer(input)
}
```
