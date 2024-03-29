# meta

Organization meta. Find all implementations on [organisationsnummer.dev](https://organisationsnummer.dev).

## Package meta

Every package should have `.meta.yaml` file containing information about the name, maintainer, specification version and which workflow file to show the build badge from. The values of the meta file will be used for the implementations table on [organisationsnummer.dev](https://organisationsnummer.dev)

Example of `.meta.yaml`

```yaml
name: "JavaScript"
maintainer: "@frozzare"
spec: 1.1
workflow: "nodejs.yml"
```

## License Specification

We use the [MIT license](https://opensource.org/licenses/MIT) for all packages and the copyright row should look like this:

```
Copyright (c) Organisationsnummer and Contributors
```

## Input value format

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

### Parse

The package should include a `parse` method or a static method that creates a new instance of the new class.

```js
organisationsnummer.parse(string) => new class instance
```

The class should contain a static `parse` method that returns the class instance.

### Format

Output for short `format` method

```
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

The type method can be called `type` or `getType` depending on language.

```js
interface Organisationsnummer {
    public function __construct(string input);

    // static method or functional export, see parse spec.
    public static function parse(string input);

    public function format(boolean separator = true) : string;
    public function isPersonnummer(): boolean;
    public function personnummer(): Personnummer | null;
    public function type() : string;
}

function valid(string input) {
    try {
       parse(input)
       return true
    } catch (OrganisationsnummerException) {
        return false
    }
}

// static method or functional export, see parse spec.
function parse(string input) {
    return new Organisationsnummer(input)
}
```

## Package Specification (v1.1)

This specification adds new features and includes all parts from 1.0.

The package should include `vatNumber` method that should return the vat number for a organization number.

### Pseudo-interface

```js
interface Organisationsnummer {
    function vatNumber(): string
}
