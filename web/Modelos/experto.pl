% Integrantes
% Condor Garcia Daniel Josue
% Motta Loayza Paul Angelo
% Rueda Boada Ignacio Raul
% Universidad Nacional Tecnologica de Lima Sur | 2022-1

:-dynamic sintoma/1.

sintomas([]):-
    enfermedad(E),
    write(E).
sintomas([H|T]):-
    assert(sintoma(H)),
    sintomas(T).

% Enfermedad E01

enfermedad('E01'):-
    (sintoma(s1);sintoma(s6);sintoma(s8)),
    (sintoma(s2);sintoma(s7)),
    sintoma(s3),
    (sintoma(s4);sintoma(s9)),
    sintoma(s5),
    not(sintoma(s14)),
    not(sintoma(s15)),
    not(sintoma(s16)),
    not(sintoma(s17)),
    not(sintoma(s20)),
    not(sintoma(s22)),
    not(sintoma(s23)).

% Enfermedad E02

enfermedad('E02'):-
    (sintoma(s3);sintoma(s20)),
    (sintoma(s1);sintoma(s8)),
    (sintoma(s2);sintoma(s7)),
    sintoma(s5),
    sintoma(s4),
    sintoma(s11),
    (sintoma(s12);sintoma(s13)),
    (sintoma(s14);sintoma(s15)).

% Enfermedad E03

enfermedad('E03'):-
    sintoma(s16),
    (sintoma(s3);sintoma(s17);sintoma(s20)),
    sintoma(s7),
    (sintoma(s18);sintoma(s19)),
    (sintoma(s1);sintoma(s6)),
    sintoma(s21).

% Enfermedad E04

enfermedad('E04'):-
    sintoma(s5),
    (sintoma(s1);sintoma(s6)),
    (sintoma(s8);sintoma(s23)),
    sintoma(s22).

% Enfermedad E05

enfermedad('E05'):-
    sintoma(s23),
    not(sintoma(s4)),
    not(sintoma(s17)),
    not(sintoma(s3)),
    not(sintoma(s21)),
    not(sintoma(s9)),
    not(sintoma(s10)),
    not(sintoma(s20)).

enfermedad('E05'):-
    sintoma(s8),
    (sintoma(s23);sintoma(s7)),
    not(sintoma(s4)),
    not(sintoma(s17)),
    not(sintoma(s3)),
    not(sintoma(s21)),
    not(sintoma(s9)),
    not(sintoma(s10)),
    not(sintoma(s20)).

enfermedad('E05'):-
    sintoma(s8),
    (sintoma(s23);sintoma(s7)),
    (sintoma(s13);sintoma(s11);sintoma(s12)),
    not(sintoma(s4)),
    not(sintoma(s17)),
    not(sintoma(s3)),
    not(sintoma(s21)),
    not(sintoma(s9)),
    not(sintoma(s10)),
    not(sintoma(s20)).


enfermedad(_):-
    fail.

limpiar:-
    retract(sintoma(_)),
    fail.
limpiar.
