import fs from 'fs/promises'
import ps from 'process'
import path from 'path'

/**
 * copy php files
 */
class PhpCopy {
 
  /**
   * copy php files
   */
  async run() {
    const deploymentParams = [
      [
        'src/php/oc-range-ext.php',
        'dist/php/oc-range-ext.php'
      ]
    ]
    const outDir = path.join(process.cwd(), 'dist', 'php')
    await fs.mkdir(outDir, { recursive: true })

    
    deploymentParams.forEach( async (elem) => { 
      await fs.cp(
        path.join(ps.cwd(), elem[0]), 
        path.join(ps.cwd(), elem[1]))
    })
  }
}


const task = new PhpCopy()
task.run()

// vi: se ts=2 sw=2 et:
