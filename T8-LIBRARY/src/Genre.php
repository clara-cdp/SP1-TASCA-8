<?php

namespace LibraryApp;

//Un gènere, que pot ser: Aventures, Ciència-ficció, Conte, Novel·la Policial, Paranormal, Distopia, Fantàstic.
enum Genre: string
{
    case Adventures = 'Aventures';
    case SYFY = 'Ciència-Ficció';
    case Story = 'Conte';
    case crime = 'Novel·la Policial';
    case Paranormal = 'Paranormal';
    case Dystopian = 'Distopia';
    case Fantasy = 'Fantàstic';
}
