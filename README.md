# meta

Organization meta

## Implementations

| Package | Pkg Version | Spec Version | Status | Maintainer |
|---|---|---|---|---|
| [Dart](https://github.com/organisationsnummer/dart) | [![GitHub release (latest by date)](https://img.shields.io/github/v/release/organisationsnummer/dart?style=flat-square)](https://github.com/organisationsnummer/dart) | [1.1](https://github.com/organisationsnummer/meta/#package-specification-v11) | [![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/organisationsnummer/dart/test.yml?branch=master)](https://github.com/organisationsnummer/dart/actions) | [@frozzare](https://github.com/frozzare)
| [Go](https://github.com/organisationsnummer/go) | [![GitHub release (latest by date)](https://img.shields.io/github/v/release/organisationsnummer/go?style=flat-square)](https://github.com/organisationsnummer/go) | [1.1](https://github.com/organisationsnummer/meta/#package-specification-v11) | [![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/organisationsnummer/go/go.yml?branch=master)](https://github.com/organisationsnummer/go/actions) | [@frozzare](https://github.com/frozzare)
| [Java](https://github.com/organisationsnummer/java) | [![GitHub release (latest by date)](https://img.shields.io/github/v/release/organisationsnummer/java?style=flat-squarehttps://img.shields.io/github/v/release/organisationsnummer/java?style=flat-square)](https://github.com/organisationsnummer/javahttps://github.com/organisationsnummer/java) | [1.1](https://github.com/personnummer/meta/#package-specification-v11) | [![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/organisationsnummer/java/test.yml?branch=master)](https://github.com/personnummer/java/actionshttps://github.com/personnummer/java/actions) | [@Johannestegner](https://github.com/Johannestegner)
| [JavaScript](https://github.com/organisationsnummer/js) | [![GitHub release (latest by date)](https://img.shields.io/github/v/release/organisationsnummer/js?style=flat-square)](https://github.com/organisationsnummer/js) | [1.1](https://github.com/personnummer/meta/#package-specification-v11) | [![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/organisationsnummer/js/nodejs.yml?branch=master)](https://github.com/personnummer/js/actions) | [@frozzare](https://github.com/frozzare)
| [C#](https://github.com/organisationsnummer/csharp) | [![GitHub release (latest by date)](https://img.shields.io/github/v/release/organisationsnummer/csharp?style=flat-square)](https://github.com/organisationsnummer/csharp) | [1.1](https://github.com/personnummer/meta/#package-specification-v11) | [![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/organisationsnummer/csharp/test.yml?branch=master)](https://github.com/personnummer/csharp/actions) | [@Johannestegner](https://github.com/Johannestegner)
| [PHP](https://github.com/organisationsnummer/php) | [![GitHub release (latest by date)](https://img.shields.io/github/v/release/organisationsnummer/php?style=flat-square)](https://github.com/organisationsnummer/php) | [1.1](https://github.com/personnummer/meta/#package-specification-v11) | [![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/organisationsnummer/php/test.yml?branch=master)](https://github.com/personnummer/php/actions) | [@Johannestegner](https://github.com/Johannestegner)
| [Rust](https://github.com/organisationsnummer/rust) | [![GitHub release (latest by date)](https://img.shields.io/github/v/release/organisationsnummer/rust?style=flat-square)](https://github.com/organisationsnummer/rust) | [1.1](https://github.com/personnummer/meta/#package-specification-v11) | [![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/organisationsnummer/rust/rust.yml?branch=master)](https://github.com/personnummer/rust/actions) | [@frozzare](https://github.com/frozzare)

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
