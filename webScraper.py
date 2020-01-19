def _text_getter(self, obj):
    text = obj.text
    if text.strip() in ('CSV', 'DOC'):
        try:
            text = base_url + obj.find('a')['href']
        except (TypeError, KeyError):
            pass
    return text

from pandas.io.html import _BeautifulSoupHtml5LibFrameParser as bsp

bsp._text_getter = _text_getter
base_url = 'https://open.canada.ca/data/en/dataset/69bdc3eb-e919-4854-bc52-a435a3e19092'
url = base_url + 'dataset.html'

import pandas as pd
df = pd.read_html(url, attrs={'class': 'dataframe'},
                  header=0, flavor='html5lib')[0]

for row in df.head().iterrows():
    print('%-14s: %s' % (row[1].Item, row[1].csv))