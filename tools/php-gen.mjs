import fs from 'fs/promises'
import path from 'path'
import process from 'process'
import ejs from 'ejs'


/**
 * php file generator
 */
class PhpGen {


  /**
   * generate php file
   */
  async run() {

    let controlType = await fs.readFile(
      path.join(process.cwd(), 'src', 'control-type.txt'),
      { encoding: 'utf-8'})
    let contents = await fs.readFile(
      path.join(process.cwd(), 'src', 'php', 'oc-range.php'),
      { encoding: 'utf-8'})

    controlType = controlType.trim()
    contents = ejs.render(contents, { controlType })

    const outDir = path.join(process.cwd(), 'dist', 'php')
    await fs.mkdir(outDir, { recursive: true })

    await fs.writeFile(path.join(outDir, 'oc-range.php'), contents)
  }
  
}

(()=>{
  const phpGen = new PhpGen()

  phpGen.run()
})()

// vi: se ts=2 sw=2 et:
