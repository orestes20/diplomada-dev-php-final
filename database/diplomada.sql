--
-- PostgreSQL database dump
--

-- Dumped from database version 15.5 (Ubuntu 15.5-0ubuntu0.23.04.1)
-- Dumped by pg_dump version 15.5 (Ubuntu 15.5-0ubuntu0.23.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache OWNER TO postgres;

--
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO postgres;

--
-- Name: condicion_residencia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.condicion_residencia (
    id_condicion_residencia integer NOT NULL,
    "80" character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.condicion_residencia OWNER TO postgres;

--
-- Name: condicion_residencia_id_condicion_residencia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.condicion_residencia_id_condicion_residencia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.condicion_residencia_id_condicion_residencia_seq OWNER TO postgres;

--
-- Name: condicion_residencia_id_condicion_residencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.condicion_residencia_id_condicion_residencia_seq OWNED BY public.condicion_residencia.id_condicion_residencia;


--
-- Name: curso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.curso (
    id_curso integer NOT NULL,
    curso text NOT NULL,
    tiempo character varying(50) NOT NULL,
    modalidad character varying(50) NOT NULL,
    dirigido_a text NOT NULL,
    objetivo text NOT NULL,
    contenido text NOT NULL,
    horas_academicas integer NOT NULL,
    id_turno integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.curso OWNER TO postgres;

--
-- Name: curso_id_curso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.curso_id_curso_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.curso_id_curso_seq OWNER TO postgres;

--
-- Name: curso_id_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.curso_id_curso_seq OWNED BY public.curso.id_curso;


--
-- Name: curso_profesor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.curso_profesor (
    id integer NOT NULL,
    id_profesor integer NOT NULL,
    id_curso integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.curso_profesor OWNER TO postgres;

--
-- Name: curso_profesor_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.curso_profesor_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.curso_profesor_id_seq OWNER TO postgres;

--
-- Name: curso_profesor_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.curso_profesor_id_seq OWNED BY public.curso_profesor.id;


--
-- Name: estado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estado (
    id_estado integer NOT NULL,
    estado character varying(80) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.estado OWNER TO postgres;

--
-- Name: estado_civil; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estado_civil (
    id_estado_civil integer NOT NULL,
    estado_civil character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.estado_civil OWNER TO postgres;

--
-- Name: estado_civil_id_estado_civil_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estado_civil_id_estado_civil_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estado_civil_id_estado_civil_seq OWNER TO postgres;

--
-- Name: estado_civil_id_estado_civil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estado_civil_id_estado_civil_seq OWNED BY public.estado_civil.id_estado_civil;


--
-- Name: estado_id_estado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estado_id_estado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estado_id_estado_seq OWNER TO postgres;

--
-- Name: estado_id_estado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estado_id_estado_seq OWNED BY public.estado.id_estado;


--
-- Name: estudiante; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estudiante (
    id_estudiante integer NOT NULL,
    nombre character varying(80) NOT NULL,
    apellido character varying(80) NOT NULL,
    cedula character varying(20) NOT NULL,
    sexo character varying(255) NOT NULL,
    fecha_nac date NOT NULL,
    direccion text,
    telefono_habitacion character varying(45),
    telefono_otros character varying(45),
    celular character varying(45),
    correo character varying(45),
    realizo_curso_anterior character varying(2),
    curso_anterior character varying(200),
    foto_carnet text,
    fotocopia_cedula text,
    curriculum text,
    constancia_idiomas text,
    partida_nacimiento_copia text,
    certificaciones_pregrado text,
    titulo_pregrado_copia text,
    notas_certificadas text,
    calificaciones_postgrado_copia text,
    titulo_postgrado text,
    otros_titulos text,
    id_estado_civil integer,
    id_nacionalidad integer,
    id_privado_libertad integer,
    id_datos_laborales integer,
    id_datos_academicos integer,
    id_condicion_residencial integer,
    id_usuario integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    estatus_documentos character varying,
    transaccion_documentos character varying,
    id_curso integer,
    wallet character varying
);


ALTER TABLE public.estudiante OWNER TO postgres;

--
-- Name: estudiante_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estudiante_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estudiante_id_seq OWNER TO postgres;

--
-- Name: estudiante_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estudiante_id_seq OWNED BY public.estudiante.id_estudiante;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: job_batches; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO postgres;

--
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.jobs_id_seq OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: municipio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.municipio (
    id_municipio integer NOT NULL,
    municipio character varying(100) NOT NULL,
    id_estado integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.municipio OWNER TO postgres;

--
-- Name: municipio_id_municipio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.municipio_id_municipio_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.municipio_id_municipio_seq OWNER TO postgres;

--
-- Name: municipio_id_municipio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.municipio_id_municipio_seq OWNED BY public.municipio.id_municipio;


--
-- Name: nacionalidad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.nacionalidad (
    id_nacionalidad integer NOT NULL,
    nacionalidad character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.nacionalidad OWNER TO postgres;

--
-- Name: nacionalidad_id_nacionlidad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.nacionalidad_id_nacionlidad_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nacionalidad_id_nacionlidad_seq OWNER TO postgres;

--
-- Name: nacionalidad_id_nacionlidad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.nacionalidad_id_nacionlidad_seq OWNED BY public.nacionalidad.id_nacionalidad;


--
-- Name: notas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.notas (
    id_notas integer NOT NULL,
    id_estudiante integer,
    notas double precision,
    id_curso integer,
    created_at timestamp with time zone,
    updated_at timestamp with time zone
);


ALTER TABLE public.notas OWNER TO postgres;

--
-- Name: notas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.notas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.notas_id_seq OWNER TO postgres;

--
-- Name: notas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.notas_id_seq OWNED BY public.notas.id_notas;


--
-- Name: parroquia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.parroquia (
    id_parroquia integer NOT NULL,
    parroquia character varying(255) NOT NULL,
    id_municipio integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.parroquia OWNER TO postgres;

--
-- Name: parroquia_id_parroquia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.parroquia_id_parroquia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.parroquia_id_parroquia_seq OWNER TO postgres;

--
-- Name: parroquia_id_parroquia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.parroquia_id_parroquia_seq OWNED BY public.parroquia.id_parroquia;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- Name: perfil; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.perfil (
    id_perfil integer NOT NULL,
    perfil text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.perfil OWNER TO postgres;

--
-- Name: perfil_id_perfil_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.perfil_id_perfil_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perfil_id_perfil_seq OWNER TO postgres;

--
-- Name: perfil_id_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.perfil_id_perfil_seq OWNED BY public.perfil.id_perfil;


--
-- Name: persona; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.persona (
    id_persona integer NOT NULL,
    nombre character varying(255) NOT NULL,
    apellido character varying(255) NOT NULL,
    cedula character varying(255) NOT NULL,
    fecha_nacimiento character varying(255) NOT NULL,
    sexo character varying(255) NOT NULL,
    correo character varying(255) NOT NULL,
    telefono character varying(255) NOT NULL,
    id_usuario integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.persona OWNER TO postgres;

--
-- Name: persona_id_persona_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.persona_id_persona_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.persona_id_persona_seq OWNER TO postgres;

--
-- Name: persona_id_persona_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.persona_id_persona_seq OWNED BY public.persona.id_persona;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- Name: titulo_academico; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.titulo_academico (
    id_titulo_academico integer NOT NULL,
    titulo_obtenido character varying(100) NOT NULL,
    institucion character varying(100) NOT NULL,
    anio_ingreso date NOT NULL,
    id_nivel_academico integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.titulo_academico OWNER TO postgres;

--
-- Name: titulo_academico_id_titulo_academico_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.titulo_academico_id_titulo_academico_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.titulo_academico_id_titulo_academico_seq OWNER TO postgres;

--
-- Name: titulo_academico_id_titulo_academico_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.titulo_academico_id_titulo_academico_seq OWNED BY public.titulo_academico.id_titulo_academico;


--
-- Name: turno; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.turno (
    id_turno integer NOT NULL,
    turno character varying
);


ALTER TABLE public.turno OWNER TO postgres;

--
-- Name: turno_id_turno_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.turno_id_turno_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.turno_id_turno_seq OWNER TO postgres;

--
-- Name: turno_id_turno_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.turno_id_turno_seq OWNED BY public.turno.id_turno;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id_usuario integer NOT NULL,
    usuario text NOT NULL,
    clave text NOT NULL,
    id_perfil integer NOT NULL,
    id_parroquia integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_seq OWNER TO postgres;

--
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id_usuario;


--
-- Name: condicion_residencia id_condicion_residencia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.condicion_residencia ALTER COLUMN id_condicion_residencia SET DEFAULT nextval('public.condicion_residencia_id_condicion_residencia_seq'::regclass);


--
-- Name: curso id_curso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.curso ALTER COLUMN id_curso SET DEFAULT nextval('public.curso_id_curso_seq'::regclass);


--
-- Name: curso_profesor id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.curso_profesor ALTER COLUMN id SET DEFAULT nextval('public.curso_profesor_id_seq'::regclass);


--
-- Name: estado id_estado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado ALTER COLUMN id_estado SET DEFAULT nextval('public.estado_id_estado_seq'::regclass);


--
-- Name: estado_civil id_estado_civil; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_civil ALTER COLUMN id_estado_civil SET DEFAULT nextval('public.estado_civil_id_estado_civil_seq'::regclass);


--
-- Name: estudiante id_estudiante; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estudiante ALTER COLUMN id_estudiante SET DEFAULT nextval('public.estudiante_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: municipio id_municipio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipio ALTER COLUMN id_municipio SET DEFAULT nextval('public.municipio_id_municipio_seq'::regclass);


--
-- Name: nacionalidad id_nacionalidad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nacionalidad ALTER COLUMN id_nacionalidad SET DEFAULT nextval('public.nacionalidad_id_nacionlidad_seq'::regclass);


--
-- Name: notas id_notas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.notas ALTER COLUMN id_notas SET DEFAULT nextval('public.notas_id_seq'::regclass);


--
-- Name: parroquia id_parroquia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parroquia ALTER COLUMN id_parroquia SET DEFAULT nextval('public.parroquia_id_parroquia_seq'::regclass);


--
-- Name: perfil id_perfil; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.perfil ALTER COLUMN id_perfil SET DEFAULT nextval('public.perfil_id_perfil_seq'::regclass);


--
-- Name: persona id_persona; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona ALTER COLUMN id_persona SET DEFAULT nextval('public.persona_id_persona_seq'::regclass);


--
-- Name: titulo_academico id_titulo_academico; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.titulo_academico ALTER COLUMN id_titulo_academico SET DEFAULT nextval('public.titulo_academico_id_titulo_academico_seq'::regclass);


--
-- Name: turno id_turno; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.turno ALTER COLUMN id_turno SET DEFAULT nextval('public.turno_id_turno_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: usuario id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuario_id_seq'::regclass);


--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- Data for Name: condicion_residencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.condicion_residencia (id_condicion_residencia, "80", created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: curso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.curso (id_curso, curso, tiempo, modalidad, dirigido_a, objetivo, contenido, horas_academicas, id_turno, created_at, updated_at) FROM stdin;
1	DOCENCIA UNIVERSITARIA	128	virtual	Profesionales universitarios (graduados en el área No Docente) que deseen desarrollar competencias pedagógicas para la enseñanza universitaria, con buen manejo en el uso de técnicas y herramientas informáticas	Capacitar al profesional universitario en los fundamentos teóricos y prácticos del proceso de enseñanza y aprendizaje en la educación universitaria, haciendo énfasis en la incorporación de las TIC como factor que garantice un mejor desempeño como docente universitario	Fundamentos de la educación universitaria Planificación Educativa Evaluación de loa Aprendizaje La Educación Multimodal Aprendizaje síncrono y asíncrono	128	4	\N	\N
2	INFORMÁTICA FORENCE	128	virtual	Profesionales, preferiblemente en las áreas de informática y telecomunicaciones, con competencias en investigaciones y seguridad de la información	Preparar profesionales en los aspectos científicos y técnicos que conforman el campo de las tecnologías de la información, la criminalistica y el marco jurídico, para enfrentar la creciente inserción de los delitos informáticos en las organizaciones.	Introducción a la Criminalistica, Marco Legal en la informática Forense Tecnología de la Información Electrónica Informática Forense Analisis Forense	128	4	\N	\N
\.


--
-- Data for Name: curso_profesor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.curso_profesor (id, id_profesor, id_curso, created_at, updated_at) FROM stdin;
1	44	2	2025-01-07 18:14:29	2025-01-07 18:14:29
\.


--
-- Data for Name: estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estado (id_estado, estado, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: estado_civil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estado_civil (id_estado_civil, estado_civil, created_at, updated_at) FROM stdin;
1	Soltero/a	\N	\N
2	Casado/a	\N	\N
3	Divorciado/a	\N	\N
4	Viudo/a	\N	\N
5	Union de estado libre de hecho	\N	\N
\.


--
-- Data for Name: estudiante; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estudiante (id_estudiante, nombre, apellido, cedula, sexo, fecha_nac, direccion, telefono_habitacion, telefono_otros, celular, correo, realizo_curso_anterior, curso_anterior, foto_carnet, fotocopia_cedula, curriculum, constancia_idiomas, partida_nacimiento_copia, certificaciones_pregrado, titulo_pregrado_copia, notas_certificadas, calificaciones_postgrado_copia, titulo_postgrado, otros_titulos, id_estado_civil, id_nacionalidad, id_privado_libertad, id_datos_laborales, id_datos_academicos, id_condicion_residencial, id_usuario, created_at, updated_at, estatus_documentos, transaccion_documentos, id_curso, wallet) FROM stdin;
4	Mercedea	Lopez	00003333	femenino	2007-01-01	Dirección de prueba	021255555555	04125555555	04125555555	dizeroroimma-4580@yopmail.com	si	curso 2 de prueba	foto_carnet/foto_carnet_28_2024-10-02.pdf	fotocopia_cedula/fotocopia_cedula_28_2024-10-02.pdf	curriculum/curriculum_28_2024-10-02.pdf	\N	partida_nacimiento/partida_nacimiento_28_2024-10-02.pdf	\N	\N	\N	\N	titulo_postgrado/titulo_postgrado_28_2024-10-02.pdf	otros_titulos/otros_titulos_28_2024-10-02.pdf	\N	\N	\N	\N	\N	\N	28	2024-10-02 03:54:57	2024-10-02 05:37:09	\N	8665502a57bb6def8e830e31d6b9b6c0f94234f5121763fd697e0f1033a18331	2	addr_test1qz4s70vvehxpc4zrx2rlarmm9tf08yp8l00z3qve9xrxmc9y2jnwwu9ttehx4lzqex4swlttsngd5flt5aqmgtvxk8esgtunrs
8	JAIME	CARDENAS	00007777	masculino	1991-09-18	Prueba	02123333333	041288888888	0412333333	bregeituboitto-8799@yopmail.com	si	curso 6 de prueba	foto_carnet/foto_carnet_32_2024-10-02.pdf	fotocopia_cedula/fotocopia_cedula_32_2024-10-02.pdf	curriculum/curriculum_32_2024-10-02.pdf	\N	partida_nacimiento/partida_nacimiento_32_2024-10-02.pdf	\N	\N	\N	\N	titulo_postgrado/titulo_postgrado_32_2024-10-02.pdf	otros_titulos/otros_titulos_32_2024-10-02.pdf	\N	1	\N	\N	\N	\N	32	2024-10-02 04:07:03	2024-10-02 06:25:43	\N	43c7b9c845a75357beb6fb8278c683726f3d01bd0f39b78126cfdfdae20b339a	1	addr_test1qz4s70vvehxpc4zrx2rlarmm9tf08yp8l00z3qve9xrxmc9y2jnwwu9ttehx4lzqex4swlttsngd5flt5aqmgtvxk8esgtunrs
3	Orestes	Gutierrez	18814102	masculino	1996-06-19	dirección de prueba	02125634187	041288888888	04122045123	orestesm20@gmail.com	si	curso 1 de prueba	foto_carnet/foto_carnet_27_2024-10-13.pdf	fotocopia_cedula/fotocopia_cedula_27_2024-10-13.pdf	curriculum/curriculum_27_2024-10-13.pdf	\N	partida_nacimiento/partida_nacimiento_27_2024-10-13.pdf	\N	\N	\N	\N	titulo_postgrado/titulo_postgrado_27_2024-10-13.pdf	otros_titulos/otros_titulos_27_2024-10-13.pdf	\N	1	\N	\N	\N	\N	27	2024-09-24 23:35:09	2024-10-13 18:30:17	on	43aaaef5f08d638217625d60a63d61fc7ad73420508c3d7fd6ad3c9b488e7e9c	1	\N
7	FERNANDA	CAMPOS	00001111	femenino	1996-05-15	Dirección de prueba	02129999999	041288888888	04127777777	quolluddeutanno-6581@yopmail.com	si	curso 5 de prueba	foto_carnet/foto_carnet_31_2024-10-02.pdf	fotocopia_cedula/fotocopia_cedula_31_2024-10-02.pdf	curriculum/curriculum_31_2024-10-02.pdf	\N	partida_nacimiento/partida_nacimiento_31_2024-10-02.pdf	\N	\N	\N	\N	titulo_postgrado/titulo_postgrado_31_2024-10-02.pdf	otros_titulos/otros_titulos_31_2024-10-02.pdf	\N	1	\N	\N	\N	\N	31	2024-10-02 04:03:18	2024-10-02 06:20:17	\N	1e7e9acf7ce272ec997ffa240d7cc9b255f7e08ac265ed5dd7d291b4a94532d2	2	addr_test1qz4s70vvehxpc4zrx2rlarmm9tf08yp8l00z3qve9xrxmc9y2jnwwu9ttehx4lzqex4swlttsngd5flt5aqmgtvxk8esgtunrs
6	GONZALO	BALCAZAR	00006666	masculino	2001-12-12	Dirección de prueba	02128888888	041288888888	04127777777	heiceceinona-7141@yopmail.com	si	curso 4 de prueba	foto_carnet/foto_carnet_30_2024-10-02.pdf	fotocopia_cedula/fotocopia_cedula_30_2024-10-02.pdf	curriculum/curriculum_30_2024-10-02.pdf	\N	partida_nacimiento/partida_nacimiento_30_2024-10-02.pdf	\N	titulo/titulo_30_2024-10-02.pdf	notas/notas_30_2024-10-02.pdf	\N	titulo_postgrado/titulo_postgrado_30_2024-10-02.pdf	otros_titulos/otros_titulos_30_2024-10-02.pdf	\N	1	\N	\N	\N	\N	30	2024-10-02 04:01:00	2024-10-13 15:24:21	on	2809fe482ce3bc3240bdfa8ceaf1fb6df178c8530571372b1559804cf266b4b4	1	addr_test1qz4s70vvehxpc4zrx2rlarmm9tf08yp8l00z3qve9xrxmc9y2jnwwu9ttehx4lzqex4swlttsngd5flt5aqmgtvxk8esgtunrs
5	BYRON	CEVALLOS	00004444	femenino	2004-05-03	Dirección de prueba 2	021222222222	04125555555	02122222222	xalozebreddau-1679@yopmail.com	si	curso 3 de prueba	foto_carnet/foto_carnet_29_2024-10-02.pdf	fotocopia_cedula/fotocopia_cedula_29_2024-10-02.pdf	curriculum/curriculum_29_2024-10-02.pdf	\N	partida_nacimiento/partida_nacimiento_29_2024-10-02.pdf	\N	titulo/titulo_29_2024-10-02.pdf	notas/notas_29_2024-10-02.pdf	\N	titulo_postgrado/titulo_postgrado_29_2024-10-02.pdf	otros_titulos/otros_titulos_29_2024-10-02.pdf	\N	\N	\N	\N	\N	\N	29	2024-10-02 03:57:32	2024-10-13 15:24:30	on	241a9b4ae1e2dbf4d4b27872542ee1996c60d4b48771c0e6c5ceaea5d6b0f886	1	addr_test1qz4s70vvehxpc4zrx2rlarmm9tf08yp8l00z3qve9xrxmc9y2jnwwu9ttehx4lzqex4swlttsngd5flt5aqmgtvxk8esgtunrs
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2024_04_19_143615_perfil	1
5	2024_04_19_143624_nacionalidad	1
6	2024_04_19_143641_estado_civil	1
7	2024_04_19_143659_consicion_residencial	1
8	2024_04_19_143737_personal	1
9	2024_04_19_144542_usuario	1
10	2024_04_19_144619_estudiante	1
11	2024_04_19_144629_titulo_academico	1
12	2024_04_19_144643_estado	1
13	2024_04_19_144647_municipio	1
14	2024_04_19_144653_parroquia	1
15	2024_04_19_144702_curso	1
16	2024_04_19_144725_estudiante_has_titulo_academico	1
17	2024_04_19_144739_nivel_academico	1
18	2024_04_19_144830_estudiante_has_curso	1
19	2024_04_19_144848_datos_laborales	1
20	2024_04_19_144857_datos_pago	1
21	2024_04_19_144905_datos_academicos	1
22	2024_04_19_145031_condicion_libertad	1
23	2025_01_07_164422_curso_profesor	2
\.


--
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.municipio (id_municipio, municipio, id_estado, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: nacionalidad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.nacionalidad (id_nacionalidad, nacionalidad, created_at, updated_at) FROM stdin;
1	Venezolana	\N	\N
\.


--
-- Data for Name: notas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.notas (id_notas, id_estudiante, notas, id_curso, created_at, updated_at) FROM stdin;
20	4	10	2	2025-01-27 09:14:13-04	2025-01-27 09:14:13-04
\.


--
-- Data for Name: parroquia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.parroquia (id_parroquia, parroquia, id_municipio, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: perfil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.perfil (id_perfil, perfil, created_at, updated_at) FROM stdin;
1	Administrador	\N	\N
3	Aspirante	\N	\N
4	Analista	\N	\N
5	Profesor	\N	\N
2	Estudiante	\N	\N
\.


--
-- Data for Name: persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.persona (id_persona, nombre, apellido, cedula, fecha_nacimiento, sexo, correo, telefono, id_usuario, created_at, updated_at) FROM stdin;
1	admin	admin	00000001	1900-01-01	Masculino	admin@admin.com	041212345678	1	\N	\N
5	Orestes	Gutierrez	12345678	1986-09-19	masculino	orestesmiguel20@yahoo.es	04122045123	2	2024-05-11 10:53:42	2024-05-11 10:53:42
6	Nando	Viti	12345678	1990-01-01	masculino	cualquiera@cualquiera.com	04122045123	7	2024-05-11 14:31:29	2024-05-11 14:31:29
7	Profesor	Apellido	11113333	1998-01-01	masculino	profesor@gmaul.com	04122045123	33	2025-01-04 19:24:24	2025-01-04 19:24:24
8	Segundo	Profesor	00007788	1998-03-06	masculino	profesor2@gmail.com	04122045123	34	2025-01-06 06:22:06	2025-01-06 06:22:06
9	Segundo	Profesor	00007788	1998-03-06	masculino	profesor2@gmail.com	04122045123	35	2025-01-06 06:22:09	2025-01-06 06:22:09
10	Segundo	Profesor	00007788	1998-03-06	masculino	profesor2@gmail.com	04122045123	36	2025-01-06 06:24:04	2025-01-06 06:24:04
11	Segundo	Profesor	00007788	1998-03-06	masculino	profesor2@gmail.com	04122045123	37	2025-01-06 06:25:35	2025-01-06 06:25:35
12	Segundo	Profesor	00007788	1998-03-06	masculino	profesor2@gmail.com	04122045123	38	2025-01-06 06:26:02	2025-01-06 06:26:02
13	Segundo	Profesor	00007788	1998-03-06	masculino	profesor2@gmail.com	04122045123	39	2025-01-06 06:28:27	2025-01-06 06:28:27
14	gerente	CEVALLOS	00003334	2001-01-05	masculino	profesor@gmail.com	04122045123	40	2025-01-06 06:34:06	2025-01-06 06:34:06
15	Orestes	Gutierrez	00004448	1998-01-01	masculino	profesor@gmail.com	04122045123	41	2025-01-06 06:36:42	2025-01-06 06:36:42
16	Orestes	Gutierrez	00004448	1998-01-01	masculino	profesor@gmail.com	04122045123	42	2025-01-06 06:36:53	2025-01-06 06:36:53
17	Orestes	Gutierrez	00004448	1998-01-01	masculino	profesor@gmail.com	04122045123	43	2025-01-06 06:37:08	2025-01-06 06:37:08
18	Orestes	Gutierrez	18814102	2008-01-06	masculino	profesor@gmail.com	04122045123	44	2025-01-06 06:39:09	2025-01-06 06:39:09
19	MERCEDES	LOPEZ	00003338	2005-02-05	masculino	profesor@hotmail.com	04122045123	45	2025-01-06 06:40:48	2025-01-06 06:40:48
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
EzQTS1oBGk6ipaj05NvR65uhzWCjMrkisClKLa9r	\N	127.0.0.1	Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36	YTo5OntzOjY6Il90b2tlbiI7czo0MDoiNVV5d1haRkVXaU5mb1BtNjk3S1NiaVB5WGZ0MjRzUWlxelBmQjJpbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hc3BpcmFudGUvZXN0dWRpYW50ZV9ub3RhcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MjoiaWQiO2k6MzE7czo5OiJpZF9wZXJmaWwiO2k6MjtzOjY6Im5vbWJyZSI7czoxNToiRkVSTkFOREEgQ0FNUE9TIjtzOjY6InBlcmZpbCI7czoxMDoiRXN0dWRpYW50ZSI7czoxMToiZG9jdW1pZW50b3MiO3M6NjQ6IjFlN2U5YWNmN2NlMjcyZWM5OTdmZmEyNDBkN2NjOWIyNTVmN2UwOGFjMjY1ZWQ1ZGQ3ZDI5MWI0YTk0NTMyZDIiO3M6NzoidXN1YXJpbyI7czozMjoicXVvbGx1ZGRldXRhbm5vLTY1ODFAeW9wbWFpbC5jb20iO30=	1737988703
H9LWxOCf2yza7QDol6I5iKVy1GOeIjUqvHsCPlRO	\N	127.0.0.1	Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:134.0) Gecko/20100101 Firefox/134.0	YTo4OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FzcGlyYW50ZS9jb25zdWx0YXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiUEo1Zkc3eXVneEhRNGlSdVdsZ0RhN1ZodHo1T0Y1T3Z5M0tqd0Y5ZiI7czoyOiJpZCI7aTo0NDtzOjk6ImlkX3BlcmZpbCI7aTo1O3M6Njoibm9tYnJlIjtzOjE3OiJPcmVzdGVzIEd1dGllcnJleiI7czo2OiJwZXJmaWwiO3M6ODoiUHJvZmVzb3IiO3M6NzoidXN1YXJpbyI7czoxODoicHJvZmVzb3JAZ21haWwuY29tIjt9	1737986677
\.


--
-- Data for Name: titulo_academico; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.titulo_academico (id_titulo_academico, titulo_obtenido, institucion, anio_ingreso, id_nivel_academico, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: turno; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.turno (id_turno, turno) FROM stdin;
1	diurno
2	nocturno
3	vespertino
4	sabatino
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id_usuario, usuario, clave, id_perfil, id_parroquia, created_at, updated_at) FROM stdin;
1	admin@admin.com	eyJpdiI6IjNrczNuRHBYWXJQS1FRekxjWC92SVE9PSIsInZhbHVlIjoiSlBRVDh6dDlMN1BnQ3dadXVrMEZOdz09IiwibWFjIjoiNGIwOTBjMWQ5MDU2OGYwNjQwZWM5ZjFhYzkwYjMyZjExMWFkYjEyYTQzN2U0NzE3Nzc4YTJjYzYwNWMxZjIwZCIsInRhZyI6IiJ9	1	\N	\N	\N
2	orestesmiguel20@yahoo.es	eyJpdiI6IkdIc2Y2aS9uaUg2Ry9NWHViVWIxcVE9PSIsInZhbHVlIjoicnJEWnFHVDRxTWxENUpNdW5ydXlnZz09IiwibWFjIjoiOGQxZTJjYmIwYjRlYTE1ZGQ2YzYzYmYxYWQ3MzIyNGY1ZmE4NDhlMDEwMWI0ZmI1M2U5ZDViYWRlZDA2M2JmMyIsInRhZyI6IiJ9	4	\N	2024-05-11 10:53:42	2024-05-11 10:53:42
3	cualquiera@cualquiera.com	eyJpdiI6ImZ0TDRralpRcnlzb2ppemNRcmh0S3c9PSIsInZhbHVlIjoidk9IWnQyVmN0SlNnRlFjSlA0bHJnQT09IiwibWFjIjoiMDE1ZTQxNTZiNWMzZDMwNzBlOTM0OGY1MDE2YmU0OTFhM2U1ZTVjNWVmZDdjNWFlNjNlYzk3ZTk4MzczM2YyNSIsInRhZyI6IiJ9	4	\N	2024-05-11 14:27:19	2024-05-11 14:27:19
4	cualquiera@cualquiera.com	eyJpdiI6ImJIQWdmbjA3Wjl2RlJQTUhnNlBsNnc9PSIsInZhbHVlIjoield2QUJINHhCeVFFWTBzSnlFRHM1QT09IiwibWFjIjoiZjhhODZiMjJmMmVjODhlNTBlYWVkMDcwMTY0YTU5YjczYTY5MDhlOTI2ODgwOTUwM2U2ZDVkOThlZjU1YzViZiIsInRhZyI6IiJ9	4	\N	2024-05-11 14:28:47	2024-05-11 14:28:47
5	cualquiera@cualquiera.com	eyJpdiI6Ijh5clp6bUpzSWlpeDBZL2x5TWd5alE9PSIsInZhbHVlIjoidXZnaFIyR2l3VDNMbnFYWHF3SzZIZz09IiwibWFjIjoiNDhkMDQ1OGZiY2U5OGYxNmEyOTg5ZGQ4NTMzYTdjNGFlYTEyNDA1MDg1ZDBmYmNhZmM0NDRjMjIwNDdlNmJkYSIsInRhZyI6IiJ9	4	\N	2024-05-11 14:29:00	2024-05-11 14:29:00
6	cualquiera@cualquiera.com	eyJpdiI6ImtRazV0aWFsZnFFSUt5TGtUNkdnQ0E9PSIsInZhbHVlIjoibGJNZHFkSDZTZG9Td2xFaWVsZVY3Zz09IiwibWFjIjoiZjJhODEwZDQwNTI5YTMwYmZmN2JmNDE5YWNhNzYwMjViNjBhMDRjMDJhNGViNzEzNTNlOGUyZWUzMTBiOTVmYSIsInRhZyI6IiJ9	4	\N	2024-05-11 14:29:39	2024-05-11 14:29:39
7	cualquiera@cualquiera.com	eyJpdiI6InRBcDhESVp4Zy9obkN0Q1Zid1ZOdUE9PSIsInZhbHVlIjoiN3VpYlpiVVZrcERzQXRlcnp4YlNnQT09IiwibWFjIjoiOGZjNTBkNmIzNTllMjE0MGQ1NWRiNzdhMTVjM2IzNjU4ODllMGQzZWM1M2VlOWIxMjExOTI4YmZlZGFiMzdjOSIsInRhZyI6IiJ9	4	\N	2024-05-11 14:31:29	2024-05-11 14:31:29
27	orestesm20@gmail.com	eyJpdiI6IjcwaVFMZHZGZzJjMXViMkJ6YkhyWUE9PSIsInZhbHVlIjoiaFNDemdadTRhcGFrSEFRc0hCSjZ5dz09IiwibWFjIjoiOTJlMTg0YWIwOWQwMGY3MDJhYjI3ZDE0MWZhZWEwNWMxNGUzNWEyNzdjNDk2NGYzOThiMWU1N2Q4YzAzMjQyZCIsInRhZyI6IiJ9	2	\N	2024-09-24 23:35:09	2024-10-13 18:30:17
33	profesor@gmaul.com	eyJpdiI6InZETjk1eC9TT0hROTZUOFpkSVNORnc9PSIsInZhbHVlIjoia1IvYndJMkNSQ2tKQWVFQUtFTlZJQT09IiwibWFjIjoiZGY1OTc5NTRjYjY1Njc2OGEzNGNkZWFjYjllMGFjNzYzZjFkOGZhZDIxZGJhZWIwY2Y3NTJiZWQwM2YyNjhlMSIsInRhZyI6IiJ9	1	\N	2025-01-04 19:24:24	2025-01-04 19:24:24
28	dizeroroimma-4580@yopmail.com	eyJpdiI6InZBOCszRUNJcEtYUm9BYjhKWnN5Wnc9PSIsInZhbHVlIjoiSGlBQmZHTVpIWHB1MkxNVzBST0NDdz09IiwibWFjIjoiNzdkZjkwOTllZWExMTE5NzExN2ZkNDI5Njk0MTYzZTkwM2QwZjBkZDlhZGFiOGUwNmE5NmUyNjdlM2FmZWQ2MCIsInRhZyI6IiJ9	2	\N	2024-10-02 03:54:57	2024-10-02 03:54:57
31	quolluddeutanno-6581@yopmail.com	eyJpdiI6IjJHZWZjcDJ3QTBrV0NMeUc1UTNGTWc9PSIsInZhbHVlIjoiQ0N5UzZ0RzBPc0d0cmh5N0Y3cnhBdz09IiwibWFjIjoiY2RiZTUyOTgyZDU1ZjIyOWVhZDJiYjRhMmE5NDQxZGQ2YzJiMDJlZTEzZTRjNzRiYzAzYWU0MTNjNjZjNGYwZiIsInRhZyI6IiJ9	2	\N	2024-10-02 04:03:18	2024-10-02 06:20:17
29	xalozebreddau-1679@yopmail.com	eyJpdiI6InpveXEzQXdkU3ZERGc0WnpTYnQzRVE9PSIsInZhbHVlIjoiVUlLcEN0U0s3ekFPSGdGZWQrQ0Zudz09IiwibWFjIjoiYWI1MTA0NGRkNjMyNmNkMWUxNmJmZjcyYjgyOWZhMWMzMzA5MjQ3MWY4NWFmMWVhNGQ5MzhmNjQ5MDYwYWE4YyIsInRhZyI6IiJ9	2	\N	2024-10-02 03:57:32	2024-10-02 06:23:34
32	bregeituboitto-8799@yopmail.com	eyJpdiI6IkpaR0w5MzZjQ1hBdGllVXhwZXZpTFE9PSIsInZhbHVlIjoiTG9NTGc0UHBNdFJMejJqUFBLZ0dvQT09IiwibWFjIjoiOTRmNGQ5MzQ5NWE0ZTQ4ODEzZWZmYTU4ODlhNGI5MTdiY2FjZTc2NmE2ODIzOGI5ZjJkNWNmNDMzZjViZmIyYSIsInRhZyI6IiJ9	2	\N	2024-10-02 04:07:03	2024-10-02 06:25:43
30	heiceceinona-7141@yopmail.com	eyJpdiI6IlNoUWoyZ0U2ZFVrWTBsb0N6TTI0dEE9PSIsInZhbHVlIjoidEtxK09iMWROeW52T2YrOFd1SDd6dz09IiwibWFjIjoiM2U4MGQ5ZmNhMTg0NjU4Y2JkM2IxMTJlZTlhYWYyODVkYTA3ZmY4ZjZiMzdmMDA3ZDM4OTYwNWUzMDdlMmY2ZCIsInRhZyI6IiJ9	2	\N	2024-10-02 04:01:00	2024-10-02 06:28:10
45	profesor@hotmail.com	eyJpdiI6ImtKZlMwblNrcEFwY2lkZFIvQTJNRFE9PSIsInZhbHVlIjoiMzZyVmJTbjdQYlFTNnBteTlDbjlKQT09IiwibWFjIjoiYWU4OGNiZTk4YzlkYjRjNGVjY2IyZTFlNDdlM2QzMTkxYzRiZmI1NmU1NWVkZGJiZThhNTY4OGRlYmJjODkxMiIsInRhZyI6IiJ9	5	\N	2025-01-06 06:40:48	2025-01-06 06:40:48
44	profesor@gmail.com	eyJpdiI6Ildqb004QXpZd2t5ZnAwK0xibE5uMUE9PSIsInZhbHVlIjoiaWs3anllUDYybEtYa0EyUUZnY3UrUT09IiwibWFjIjoiYmUwMmYwNDg3MzZlZjYwNzFlOTAxNzg2NjBlMzM0ZjQ5YzUzZjRmMjE5ODM5ODQyYmU1YzQ1ZjQ4ZjE0MDVmZSIsInRhZyI6IiJ9	5	\N	2025-01-06 06:39:09	2025-01-06 06:39:09
\.


--
-- Name: condicion_residencia_id_condicion_residencia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.condicion_residencia_id_condicion_residencia_seq', 1, false);


--
-- Name: curso_id_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.curso_id_curso_seq', 2, true);


--
-- Name: curso_profesor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.curso_profesor_id_seq', 2, true);


--
-- Name: estado_civil_id_estado_civil_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estado_civil_id_estado_civil_seq', 5, true);


--
-- Name: estado_id_estado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estado_id_estado_seq', 1, false);


--
-- Name: estudiante_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estudiante_id_seq', 8, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 23, true);


--
-- Name: municipio_id_municipio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.municipio_id_municipio_seq', 1, false);


--
-- Name: nacionalidad_id_nacionlidad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.nacionalidad_id_nacionlidad_seq', 1, true);


--
-- Name: notas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.notas_id_seq', 20, true);


--
-- Name: parroquia_id_parroquia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.parroquia_id_parroquia_seq', 1, false);


--
-- Name: perfil_id_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.perfil_id_perfil_seq', 1, false);


--
-- Name: persona_id_persona_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.persona_id_persona_seq', 19, true);


--
-- Name: titulo_academico_id_titulo_academico_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.titulo_academico_id_titulo_academico_seq', 1, false);


--
-- Name: turno_id_turno_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.turno_id_turno_seq', 4, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_seq', 45, true);


--
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- Name: condicion_residencia condicion_residencia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.condicion_residencia
    ADD CONSTRAINT condicion_residencia_pkey PRIMARY KEY (id_condicion_residencia);


--
-- Name: curso curso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.curso
    ADD CONSTRAINT curso_pkey PRIMARY KEY (id_curso);


--
-- Name: curso_profesor curso_profesor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.curso_profesor
    ADD CONSTRAINT curso_profesor_pkey PRIMARY KEY (id);


--
-- Name: estado_civil estado_civil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado_civil
    ADD CONSTRAINT estado_civil_pkey PRIMARY KEY (id_estado_civil);


--
-- Name: estado estado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado
    ADD CONSTRAINT estado_pkey PRIMARY KEY (id_estado);


--
-- Name: estudiante estudiante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estudiante
    ADD CONSTRAINT estudiante_pkey PRIMARY KEY (id_estudiante);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: municipio municipio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipio
    ADD CONSTRAINT municipio_pkey PRIMARY KEY (id_municipio);


--
-- Name: nacionalidad nacionalidad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nacionalidad
    ADD CONSTRAINT nacionalidad_pkey PRIMARY KEY (id_nacionalidad);


--
-- Name: notas notas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.notas
    ADD CONSTRAINT notas_pkey PRIMARY KEY (id_notas);


--
-- Name: parroquia parroquia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parroquia
    ADD CONSTRAINT parroquia_pkey PRIMARY KEY (id_parroquia);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: perfil perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.perfil
    ADD CONSTRAINT perfil_pkey PRIMARY KEY (id_perfil);


--
-- Name: persona persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_pkey PRIMARY KEY (id_persona);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: titulo_academico titulo_academico_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.titulo_academico
    ADD CONSTRAINT titulo_academico_pkey PRIMARY KEY (id_titulo_academico);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- PostgreSQL database dump complete
--

