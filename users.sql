-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 05 Ιουλ 2022 στις 20:47:34
-- Έκδοση διακομιστή: 10.4.18-MariaDB
-- Έκδοση PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `users`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `add_question`
--

CREATE TABLE `add_question` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer1` varchar(300) NOT NULL,
  `answer2` varchar(300) NOT NULL,
  `answer3` varchar(300) NOT NULL,
  `correct` varchar(300) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `add_question`
--

INSERT INTO `add_question` (`id`, `username`, `question`, `answer1`, `answer2`, `answer3`, `correct`, `level`) VALUES
(39, 'apostolopoulos', 'aef', 'waef', 'awef', 'wqef', 'qwef', 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `add_question_texat`
--

CREATE TABLE `add_question_texat` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `add_question_tf`
--

CREATE TABLE `add_question_tf` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `question` varchar(300) NOT NULL,
  `True1` varchar(20) NOT NULL,
  `False1` varchar(20) NOT NULL,
  `correct` varchar(20) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `appusers`
--

CREATE TABLE `appusers` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `appusers`
--

INSERT INTO `appusers` (`id`, `email`, `firstname`, `lastname`, `birthdate`, `gender`, `username`, `password`, `type`) VALUES
(35, 'utrdcfutycvg@trtyiv', 'uyrdtfgh', 'gfxd', '1995-04-25', 'Male', 'dimisap1995', '32edd4cbb88b87f5207f0aa8662784cd', 1),
(36, 'dbssbf', 'rgasdv', 'feasdc', '2021-06-10', 'Female', 'gqwrggr', '32edd4cbb88b87f5207f0aa8662784cd', 2),
(38, 'ghsdbff@hdgsf', 'ergsvqeagv', 'qesgrvqegr', '2021-06-29', 'Male', 'aedthbwrtdhgb', '32edd4cbb88b87f5207f0aa8662784cd', 2),
(39, 'asdfasdfsadf@gas', 'asdfasdfasdf', 'asdfasdfasdf', '2021-06-29', 'Female', 'asdfzxcv', '722e733bba65ef590466f923fe35b882', 1),
(40, 'kappa@gmail.com', 'wrgasvdagvdg', 'earbqergbva', '2021-06-29', 'Male', 'kappa', '32edd4cbb88b87f5207f0aa8662784cd', 1),
(41, 'vbnmvbnm@gfh', 'qwerqwer', 'cvbncvbn', '2021-06-29', 'Female', 'vbnmvbnm', '53b7ecd5389f7210310bd38149be895f', 1),
(42, 'dimisap1995@gmail.com', 'Dimitrios', 'Apostolopoulos', '1995-05-25', 'Other', 'apostolopoulos', '32edd4cbb88b87f5207f0aa8662784cd', 3),
(44, 'ethnrgsbfdvasc@gwesadf', 'eragfdsvzxc', 'wthebfsdvzx', '2021-07-01', 'Male', 'metyntwdbfaVZXc', '32edd4cbb88b87f5207f0aa8662784cd', 1),
(45, 'qwersdfsdfbgqweg@hwerlkfdb', 'tebfdvzx', 'dbafvzcx', '2021-06-30', 'Male', '1234qwer', '32edd4cbb88b87f5207f0aa8662784cd', 1),
(50, 'qwerqwer@whegd', 'qwer', 'qwer', '2021-06-28', 'Female', 'qwerqwer', '32edd4cbb88b87f5207f0aa8662784cd', 1),
(51, 'sdfgsdfg@hsdfg', 'argvsd', 'gravsd', '2021-06-30', 'Female', 'sdfgsdfg', '1a59ad6c17a787b24d8d97e8c1d3b998', 1),
(52, 'xcvbxcvbxcvbWTEHdf@wehg', 'γερφδ', 'γρεσδω', '2021-06-29', 'Other', 'χψωβχψωβ', '6157fdce21cf5bfce3de055c4c0ffece', 1),
(53, 'qsaZCX@ggsdv', 'wergsdv', 'wegrvds', '2021-06-29', 'Other', 'qazws', '32edd4cbb88b87f5207f0aa8662784cd', 1),
(54, 'uiopuiopuiop@ern', 'befdvs', 'bsdf', '2021-06-29', 'Male', 'uiopuiop', 'c0b2d344a60d05733f0a941bd79a40fe', 1),
(57, 'tryurtyu@gg', 'g', 'g', '2021-06-29', 'Female', 'rtyurtyu', '32edd4cbb88b87f5207f0aa8662784cd', 1),
(59, 'yuioyuio@sh.rdt', 'yuioyuio', 'yuio', '2022-06-14', 'Male', 'yuioyuioyuioyuio', 'a6678a57fcdcb7ee37bbacc24745db19', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `difficult_test`
--

CREATE TABLE `difficult_test` (
  `id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer1` varchar(300) NOT NULL,
  `answer2` varchar(300) NOT NULL,
  `answer3` varchar(300) NOT NULL,
  `answer4` varchar(300) NOT NULL,
  `correct` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `difficult_test`
--

INSERT INTO `difficult_test` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`) VALUES
(1, 'When did Einstein publish the general theory of relativity?', '1900', '1915', '1919', '1928', '1915'),
(2, 'Which of the following has Einstein’s general theory of relativity revolutionized', 'Google maps', 'Radar guns', 'Atomic clocks', 'All of the above', 'All of the above'),
(3, 'What does the “many worlds interpretation” of quantum mechanics suggest?', 'That each electron contains a tiny universe', 'That intelligent life elsewhere in the universe is a statistical near-certainty', 'That all possibilities of a quantum wavefunction become alternate realities', 'That quantum mechanics is only one of many explanations about how particles behave', 'That all possibilities of a quantum wavefunction become alternate realities'),
(4, 'In quantum physics, the wavefunction is king. It provides a mathematical description of the quantum state of a particle or system. What can the square of the magnitude of a particle\'s wavefunction tell us?', 'The probability that it will decay at a given time', 'Whether a Higgs boson is present', 'The mass of the particle', 'The probability that it is in a certain place at a given time', 'The probability that it is in a certain place at a given time'),
(5, 'What was Erwin Schrödinger trying to convey with his famous “cat-in-a-box” thought experiment?', 'The concept of \"entanglement\" is akin to a cat tangled up in yarn', 'A problem he saw with taking the math of quantum mechanics literally', 'That any object (i.e. a cat) cannot be considered “alive” unless it is being observed', 'That he was more of a dog person', 'A problem he saw with taking the math of quantum mechanics literally'),
(6, 'Peter Shor created an algorithm that demonstrated the potential superiority of quantum computers over classical computers at a certain tricky task. What task is Shor’s algorithm for?', 'Developing virtual reality simulations nearly identical to real life', 'Building high-powered processing software for the Large Hadron Collider', 'Finding the prime factors of very large numbers', 'Predicting the probability of certain quantum phenomena', 'Finding the prime factors of very large numbers'),
(7, 'Which experimental demonstration of quantum principles was described by Physics World as “the most beautiful experiment” of all time?', 'The Large Hadron Collider discovering the Higgs boson', 'The double-slit experiment', 'Arthur Eddington’s verification of Einstein’s general relativity during an eclipse', '“Schrödinger’s Cat” thought experiment', 'The double-slit experiment'),
(8, 'What property of quantum mechanics (dubbed “spooky action at a distance” by Einstein) has been demonstrated with pairs of photons separated by hundreds of kilometres?', 'Superposition', 'Wave-particle duality', 'Entanglement', 'The uncertainty principle', 'Entanglement'),
(9, 'What are the four basic forces of the universe?', 'Weak, strong, medium, and variable', 'Gravitational, strong, quantum, and Newtonian', 'Strong, weak, electromagnetic, and gravitational', 'Momentum, velocity, gravity, and friction', 'Strong, weak, electromagnetic, and gravitational'),
(10, 'Which is the name given to one of the fundamental principles of quantum physics?', 'Biparticle Policy', 'The Mixed Double of Quantum Mechanics', 'Twin Particle Constellation', 'Wave Particle Duality', 'Wave Particle Duality'),
(11, 'For a particle inside a box, the potential is maximum at x =', '2L', 'L/2', '3L', 'L', 'L');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `difficult_test_texat`
--

CREATE TABLE `difficult_test_texat` (
  `id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `difficult_test_texat`
--

INSERT INTO `difficult_test_texat` (`id`, `question`, `answer`) VALUES
(1, 'First of all, this great physicist in 1905, started the modern day discussions, about the dual nature of electrons. He also invented the constant named after him, which has achieved tremendous success. What\'s his name?', 'Max Planck');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `difficult_test_tf`
--

CREATE TABLE `difficult_test_tf` (
  `id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `true1` varchar(15) NOT NULL,
  `false1` varchar(15) NOT NULL,
  `correct` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `difficult_test_tf`
--

INSERT INTO `difficult_test_tf` (`id`, `question`, `true1`, `false1`, `correct`) VALUES
(1, 'The particle loses energy when it collides with the wall.', 'True', 'False', 'False'),
(2, 'The principle quantum number is related to: The shape of the orbital', 'True', 'False', 'False');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `easy_test`
--

CREATE TABLE `easy_test` (
  `id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer1` varchar(200) NOT NULL,
  `answer2` varchar(20) NOT NULL,
  `answer3` varchar(200) NOT NULL,
  `answer4` varchar(200) NOT NULL,
  `correct` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `easy_test`
--

INSERT INTO `easy_test` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`) VALUES
(1, 'Max Planck\'s great discovery was that radiation energy is emitted in packets that he calles what?', 'Quanta', 'Wave functions', 'Photons', 'Gamma rays', 'Quanta'),
(2, 'When two particles are entagled and it is observed that one has its spin up, how long does it take for other\'s spin to be down?', '1 microsecond', 'Instantaneously', 'However long it takes light to travel between them', '1 nanosecond', 'Instantaneously'),
(3, 'In the Heisenberg uncertainty principle, which two measurable properties of a particle cannot be observed precisely at the same time?', 'Energy and torque', 'Size and speed', 'Spin and color', 'Position and momentum', 'Position and momentum'),
(4, 'The square of a particle\'s wave function describes the probability of what about the particle?', 'That it has a specific spin', 'That it will delay', 'That it is at a particular place', 'That it will disappear', 'That it is at a particular place'),
(5, 'Niels Bohr used quantum mechanics to describe which element?', 'Hydrogen', 'Helium', 'Zinc', 'Carbon', 'Hydrogen'),
(6, 'In quantum mechanics, the angular momentum of a particle is called what?', 'Swirl', 'Orbital', 'Rotation', 'Spin', 'Spin'),
(7, 'The Dirac equation shows that every particle has what?', 'An antiparticle', 'A matrix', 'A duality', 'A wave function', 'An antiparticle'),
(8, 'What was the first antiparticle to be discovered?', 'Antiproton', 'Positron', 'Antineutrino', 'X-ray', 'Positron'),
(9, 'Who first described \"energy quanta\" (and won the Nobel Prize in 1918 for his role in the foundation of quantum theory)?', 'Werner Heisenberg', 'Erwin Schrödinger', 'Albert Einstein ', 'Max Planck', 'Max Planck'),
(10, 'Which of these is not one of the four basic forces?', 'Gravity', 'Strong nuclear force', 'Electromagnetism', 'Momentum', 'Momentum'),
(11, 'The principle quantum number is related to:', 'The shape of the orbital', 'The spatial orientat', 'The average distance of the most electron-dense regions from the nucleus', 'The number of electrons', 'The average distance of the most electron-dense regions from the nucleus');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `easy_test_texat`
--

CREATE TABLE `easy_test_texat` (
  `id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `easy_test_texat`
--

INSERT INTO `easy_test_texat` (`id`, `question`, `answer`) VALUES
(1, 'Space outside of our regular third dimension is known as what type of space?', 'Euclidean'),
(2, 'There are ___ types of quantum numbers.', '4');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `easy_test_tf`
--

CREATE TABLE `easy_test_tf` (
  `id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `true1` varchar(200) NOT NULL,
  `false1` varchar(200) NOT NULL,
  `correct` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `easy_test_tf`
--

INSERT INTO `easy_test_tf` (`id`, `question`, `true1`, `false1`, `correct`) VALUES
(1, 'For a particle inside a box, the potential is maximum at x = L/2', 'True', 'False', 'False'),
(2, 'The different types of subshells and corresponding number of orbitals is: S:1, p:3, d:5, f:7', 'True', 'False', 'True');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `images`
--

INSERT INTO `images` (`id`, `image_url`) VALUES
(1, 'apostolopoulos.jpg'),
(2, 'mitsotakis.jpg'),
(3, 'kagia.jpg'),
(4, ''),
(5, 'kagia.jpg'),
(6, 'kagia.jpg');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `medium_test`
--

CREATE TABLE `medium_test` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer1` varchar(300) NOT NULL,
  `answer2` varchar(300) NOT NULL,
  `answer3` varchar(300) NOT NULL,
  `answer4` varchar(300) NOT NULL,
  `correct` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `medium_test`
--

INSERT INTO `medium_test` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`) VALUES
(1, 'Whilst developing a theory of black-body radiation in 1900, Max Planch discovered that energy is quantised. Why did Planch study this phenomenon?', 'He wanted to prove that atoms don\'t exist.', 'He wanted to establish a new constant of nature', 'He wanted to establish a new radiation law.', 'He wanted to fix the \"ultraviolet catastrophe\".', 'He wanted to prove that atoms don\'t exist.'),
(2, 'In 1905 Albert Einstean speculated that radiation itself is composed of discrete quanta, and went on to develop a theory of which phenomenon?', 'The advance in the perihelion of Mercury.', 'The photoelectric effect.', 'The equivalence of mass and energy.', 'The bending of starlight as it passes close to the Sun.', 'The photoelectric effect.'),
(3, 'Niels Bohr\'s 1913 atomic theory implied that energy is quantised in discrete levels. He hypothesized that transition between these levels must be...?', 'Incredible', 'Incremental', 'Instantaneous', 'Gradual', 'Instantaneous'),
(4, 'By 1923, light was described in terms of both waces an particles. Louis de Broglie suggested that this dual description should be extended to...?', 'space and time', 'all material particles and notably to electrons', 'all forms of radiation including ultra-violet', 'all forms of energy', 'all material particles and notably to electrons'),
(5, 'In November 1925 Erwin Schrodinger gave a seminar on de Broglie\'s PhD thesis. He was told: \"To deal properly with waves, one has to have a...?', 'wave equation\"', 'Lagrangian\"', 'Hamiltonian\"', 'master equation\"', 'Lagrangian\"'),
(6, 'But what did the wavefunction mean? In June 1926, Max Born suggested that the square of the electron wavefunction at a specific place represents...?', 'a measure of the energy of the electron in that place', 'a measure of the electron charge in that place', 'the probability of finding the electron in that place', 'a measure of the momentum of the electron in that place', 'the probability of finding the electron in that place'),
(7, 'Who exclaimed in October 1926: \"If all this damned quantum jumping were... here to stay, I should be sorry I ever got involved with quantum theory\"?', 'Niels Bohr', 'Albert Einstein', 'Werner Heisenberg', 'Erwin Scrodinger', 'Erwin Scrodinger'),
(8, 'In February 1927, Heisenberg discovered the uncertainty principle. But when Bohr returned from a skiing trip, they had a blazin row. What about?', 'All of these alternatives', 'Heisenberg insisted that classical measuring instruments are just too \"clumsy\".We can\'t measure quantum properties without altering them in afundamentally unpredictable way.', 'Bohr insisted that the uncertainty principle places limits not on what we can measure, but what we can know.', 'Heisenberg had sought to illustrate his principle using a hypothetical gamma-ray microscope experiment. Bohr believed Heisenberg\'s analysis of this was fundamentally flawed.', 'All of these alternatives'),
(9, 'What are the four basic forces of the universe?', 'Strong, weak, electromagnetic, and gravitational', 'Weak, strong, medium, and variable', 'Momentum, velocity, gravity, and friction', 'Gravitational, strong, quantum, and Newtonian', 'Strong, weak, electromagnetic, and gravitational'),
(10, 'The walls of a particle in a box are supposed to be', 'Small but infinitely hard', 'Infinitely large but soft', 'Soft and Small', 'Infinitely hard and infinitely large', 'Infinitely hard and infinitely large'),
(11, 'Heisenberg’s Uncertainty Principle states that the ___ and ___ of an electron cannot be known simultaneously.', 'Position, mass', 'Position, charge', 'Momentum, speed', 'Position, momentum', 'Position, momentum');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `medium_test_texat`
--

CREATE TABLE `medium_test_texat` (
  `id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `medium_test_texat`
--

INSERT INTO `medium_test_texat` (`id`, `question`, `answer`) VALUES
(1, 'The magnetic quantum number describes the: Spatial orientation of the ___', 'orbital'),
(2, 'Heisenberg’s Uncertainty Principle states that the ___ and ___ of an electron cannot be known simultaneously.', 'Position, momentum');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `medium_test_tf`
--

CREATE TABLE `medium_test_tf` (
  `id` int(11) NOT NULL,
  `question` varchar(300) CHARACTER SET utf8 NOT NULL,
  `true1` varchar(100) CHARACTER SET utf8 NOT NULL,
  `false1` varchar(100) CHARACTER SET utf8 NOT NULL,
  `correct` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `medium_test_tf`
--

INSERT INTO `medium_test_tf` (`id`, `question`, `true1`, `false1`, `correct`) VALUES
(1, 'The principle quantum number is related to: The shape of the orbital', 'True', 'False', 'False'),
(2, 'The spin quantum number (ms) can have a value of: -1/2, +1/2', 'True', 'False', 'True');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `post` varchar(2000) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `posts`
--

INSERT INTO `posts` (`id`, `username`, `post`, `likes`) VALUES
(1, '', 'Kalispera aderfia', 1),
(2, '', 'Kalispera aderfia', 1),
(5, '', 'kalimera', 1),
(6, '', 'kalimera', 1),
(7, '', 'Kalispera stin omorfi parea', 1),
(8, '', 'kalimeraaaaaa zouzounia', 1),
(9, '', 'einai omorfi i zwi', 1),
(10, '', 'poly wraia', 1),
(11, '', 'kai to lydiaki mou', 1),
(12, '', 'hello boy\r\n', 1),
(13, '', 'this is my nth tweet', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `random`
--

CREATE TABLE `random` (
  `id` int(11) NOT NULL,
  `stili1` varchar(200) NOT NULL,
  `stili2` varchar(200) NOT NULL,
  `stili3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `random`
--

INSERT INTO `random` (`id`, `stili1`, `stili2`, `stili3`) VALUES
(1, '', '', ''),
(2, 'kalispera', 'mesimeri', ''),
(3, 'kalispera', 'mesimeri', 'lilia'),
(4, 'kalinixta', 'vradi', 'maria'),
(5, 'kalispera', 'prwi', 'lydia'),
(6, '1', '2', '3'),
(7, 'kalispera', 'prwi', 'lydia'),
(8, 'kalimera', 'prwi', 'lydia'),
(9, 'kalimera', 'mesimeri', 'maria'),
(10, 'kalispera', 'mesimeri', 'maria'),
(11, 'kalispera', 'prwi', ''),
(12, 'kalispera', 'prwi', ''),
(13, 'kalimera', 'mesimeri', 'maria'),
(14, 'kalimera', 'mesimeri', 'lydia'),
(15, 'kalimera', 'mesimeri', 'lilia'),
(16, 'kalimera', '', 'maria'),
(17, 'kalimera', 'mesimeri', 'maria'),
(18, 'kalimera', '', ''),
(19, 'kalimera', 'mesimeri', 'maria'),
(20, 'kalimera', 'mesimeri', 'maria'),
(21, 'kalimera', 'mesimeri', 'maria'),
(22, 'kalispera', 'prwi', 'maria'),
(23, 'kalimera', 'mesimeri', 'maria'),
(24, 'kalispera', 'vradi', 'lilia'),
(25, 'kalimera', 'prwi', 'lydia'),
(26, 'kalinixta', 'vradi', 'lilia'),
(27, 'kalinixta', 'vradi', 'lilia'),
(28, 'kalimera', 'mesimeri', 'maria'),
(29, 'kalimera', 'mesimeri', 'maria'),
(30, 'kalimera', 'mesimeri', 'maria'),
(31, 'kalimera', 'mesimeri', 'maria'),
(32, 'kalimera', 'mesimeri', 'maria'),
(33, 'kalimera', 'mesimeri', 'maria'),
(34, 'kalimera', 'mesimeri', 'maria'),
(35, 'kalimera', 'mesimeri', 'maria'),
(36, 'kalispera', 'mesimeri', 'maria'),
(37, 'kalispera', 'mesimeri', 'maria'),
(38, 'kalispera', 'mesimeri', 'maria'),
(39, 'kalispera', 'mesimeri', 'maria'),
(40, 'kalimera', 'prwi', 'lydia'),
(41, '', '', ''),
(42, '', '', '');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `testhistory`
--

CREATE TABLE `testhistory` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `testdate` datetime NOT NULL,
  `level` varchar(20) CHARACTER SET utf8 NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `testhistory`
--

INSERT INTO `testhistory` (`id`, `username`, `testdate`, `level`, `result`) VALUES
(88, 'apostolopoulos', '2021-06-30 07:49:00', '1', 0),
(89, 'apostolopoulos', '2021-07-02 11:25:00', '3', 0),
(90, 'apostolopoulos', '2021-07-02 11:35:00', '2', 0),
(91, 'apostolopoulos', '2021-07-03 12:33:00', '2', 0),
(92, 'apostolopoulos', '2021-07-03 12:41:00', '2', 0),
(93, 'apostolopoulos', '2021-07-03 01:09:00', '2', 1),
(94, 'apostolopoulos', '2021-07-03 01:09:00', '2', 1),
(95, 'apostolopoulos', '2021-07-03 01:09:00', '2', 1),
(96, 'apostolopoulos', '2021-07-03 01:09:00', '2', 1),
(97, 'apostolopoulos', '2021-07-03 01:09:00', '2', 1),
(104, 'apostolopoulos', '2021-07-03 01:15:00', '2', 2),
(105, 'apostolopoulos', '2021-07-03 01:40:00', '2', 5),
(106, 'apostolopoulos', '2021-07-03 01:43:00', '2', 5),
(107, 'apostolopoulos', '2021-07-03 01:43:00', '2', 0),
(108, 'apostolopoulos', '2021-07-03 01:43:00', '2', 1),
(109, 'apostolopoulos', '2021-07-03 12:52:00', '2', 1),
(110, 'apostolopoulos', '2021-07-03 12:52:00', '2', 2),
(111, 'apostolopoulos', '2021-07-03 12:55:00', '2', 4),
(112, 'apostolopoulos', '2021-07-03 12:56:00', '2', 4),
(113, 'apostolopoulos', '2021-07-03 12:57:00', '1', 5),
(114, 'apostolopoulos', '2021-07-03 12:57:00', '1', 5),
(115, 'apostolopoulos', '2021-07-03 01:01:00', '3', 5),
(116, 'apostolopoulos', '2021-07-03 01:01:00', '1', 0),
(117, 'apostolopoulos', '2021-07-03 01:01:00', '1', 1),
(118, 'apostolopoulos', '2021-07-03 09:36:00', '1', 3),
(119, 'apostolopoulos', '2021-07-03 09:37:00', '2', 0),
(120, 'apostolopoulos', '2021-07-03 09:37:00', '2', 1),
(121, 'apostolopoulos', '2021-07-03 09:37:00', '2', 1),
(122, 'apostolopoulos', '2021-07-06 04:07:00', '1', 2),
(123, 'rtyurtyu', '2021-07-06 04:13:00', '1', 1),
(124, 'rtyurtyu', '2021-07-06 04:14:00', '2', 4),
(125, 'apostolopoulos', '2022-06-28 11:33:00', '1', 2);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `add_question`
--
ALTER TABLE `add_question`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `add_question_texat`
--
ALTER TABLE `add_question_texat`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `add_question_tf`
--
ALTER TABLE `add_question_tf`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `appusers`
--
ALTER TABLE `appusers`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `difficult_test`
--
ALTER TABLE `difficult_test`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `difficult_test_texat`
--
ALTER TABLE `difficult_test_texat`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `difficult_test_tf`
--
ALTER TABLE `difficult_test_tf`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `easy_test`
--
ALTER TABLE `easy_test`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `easy_test_texat`
--
ALTER TABLE `easy_test_texat`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `easy_test_tf`
--
ALTER TABLE `easy_test_tf`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `medium_test`
--
ALTER TABLE `medium_test`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `medium_test_texat`
--
ALTER TABLE `medium_test_texat`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `medium_test_tf`
--
ALTER TABLE `medium_test_tf`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `random`
--
ALTER TABLE `random`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `testhistory`
--
ALTER TABLE `testhistory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `add_question`
--
ALTER TABLE `add_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT για πίνακα `add_question_texat`
--
ALTER TABLE `add_question_texat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT για πίνακα `add_question_tf`
--
ALTER TABLE `add_question_tf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT για πίνακα `appusers`
--
ALTER TABLE `appusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT για πίνακα `difficult_test`
--
ALTER TABLE `difficult_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT για πίνακα `difficult_test_texat`
--
ALTER TABLE `difficult_test_texat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `difficult_test_tf`
--
ALTER TABLE `difficult_test_tf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `easy_test`
--
ALTER TABLE `easy_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT για πίνακα `easy_test_texat`
--
ALTER TABLE `easy_test_texat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `easy_test_tf`
--
ALTER TABLE `easy_test_tf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `medium_test`
--
ALTER TABLE `medium_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT για πίνακα `medium_test_texat`
--
ALTER TABLE `medium_test_texat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `medium_test_tf`
--
ALTER TABLE `medium_test_tf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT για πίνακα `random`
--
ALTER TABLE `random`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT για πίνακα `testhistory`
--
ALTER TABLE `testhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
