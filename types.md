Get the type of a organization number with the first number, except:
- If number is a personal identity numbers the type should be `Enskild firma`
- If first number is `4` or higher than `9` the type should be `Okänt`

| number | type  |
|--------|-------|
| 1      | Dödsbon |
| 2      | Stat, landsting, kommun eller församling |
| 3      | Utländska företag som bedriver näringsverksamhet eller äger fastigheter i Sverige |
| 4      | Okänt |
| 5      | Aktiebolag |
| 6      | Enkelt bolag |
| 7      | Ekonomisk förening eller bostadsrättsförening |
| 8      | Ideella förening och stiftelse |
| 9      | Handelsbolag, kommanditbolag och enkelt bolag |
