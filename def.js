#!/usr/bin/ node

/*
  coded by Ibnusyawall 407 Authentic Exploit
*/

var needle = require('needle');
var program = require('commander');
var fs = require('fs');

program
  .version('0.0.1', '--version')
  .option('-s, --site <site>', 'Url script deface yang akan diambil')
  .option('-f, --file <file>', 'Simpan file dengan nama ex : sc1.html')

program.on('--help', () => {
  console.log('\n  Example: \n');
  console.log('  $ node scdef.js -s https://url.com -f sc1.html \n');
});

program.parse(process.argv);

function ambil(sc, file) {
  if (!sc == !file) {
    needle.get(sc, (err, resp, body) => {
      if (!resp.statusCode == 200) {
        console.log(' site error / periksa jaringan anda');
        process.exit(1);
      } else if (err) { throw err } else {
        fs.appendFile(`./result/${program.file}`, body, (err) => {
          if (err) throw err;
          console.log('\n  [ maling_sc | 407 Authentic Exploit ] \n');
          console.log(`       ${program.file} Berhasil dibuat !`);
          process.exit(1);
        })
       fs.appendFile('log.txt', `[ runing using node maling_sc on site ${program.site } ]\n`, (err) => {
        if (err) throw err;
       });
      }
    })
  } else if (sc !== file) {
    console.log(" interupt! ketik : node def.js --help");
  }
}

ambil(program.site, program.file);
