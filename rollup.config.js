import { string as rollupStr } from 'rollup-plugin-string'
import alias from '@rollup/plugin-alias'

const config = {
  input: 'src/js/index.js',
  external: ['wp'],
  output: {
    file: 'dist/js/oc-range.js',
    format: 'umd',
    globals: {
      wp: 'wp'
    }
  },
  plugins: [
    alias({
      entries: [
        {
          find: /^(control-type)$/,
          replacement: '../$1.txt'
        }
      ]
    }),
    rollupStr({
      include: '**/*.txt'
    })
  ]
}

export { config as default }
// vi: se ts=2 sw=2 et:
