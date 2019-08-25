В качестве селектора может выступать любой тег HTML, для которого определяются правила форматирования, такие как: цвет, фон, размер и т. д. Правила задаются в следующем виде.

Тег { свойство1: значение; свойство2: значение; ... }

 P { 
    text-align: justify; /* Выравнивание по ширине */
    color: green; /* Зеленый цвет текста */
   }
   
В данном примере изменяется цвет и выравнивание текста абзаца. Стиль будет применяться только к тексту, который располагается внутри контейнера <p>.

Следует понимать, что хотя стиль можно применить к любому тегу, результат будет заметен только для тегов, которые непосредственно отображаются в контейнере <body>.