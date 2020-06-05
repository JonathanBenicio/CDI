
CREATE TABLE `cdi` (
  `ID` int(11) NOT NULL,
  `dataAplicacao` date NOT NULL,
  `dataVencimento` date NOT NULL,
  `valorAplicado` int(11) NOT NULL,
  `rentabilidade` double NOT NULL,
  `valoFinal` int(11) NOT NULL,
  `diasUteis` int(11) NOT NULL,
  `diaTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `cdi`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `cdi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
