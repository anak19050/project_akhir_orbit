from flask import Flask,render_template,request,jsonify
import numpy as np
import pandas as pd
from scipy.sparse import csr_matrix
from fuzzywuzzy import process
from joblib import load
import re
import pickle
import nltk
from sklearn.feature_extraction.text import TfidfVectorizer
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
from sklearn.metrics.pairwise import cosine_similarity
from sklearn.model_selection import cross_val_score
from sklearn.metrics.pairwise import euclidean_distances
from subprocess import check_output
from nltk.tokenize import sent_tokenize, word_tokenize
from nltk.corpus import stopwords
from fungsi import *

app   = Flask(__name__, static_url_path='/static')
model = None

stopwords_ind = None
key_norm      = None
factory       = None
stemmer       = None
vocab         = None

descriptions=pd.read_csv('clean_data.csv')

vectorizer = TfidfVectorizer(stop_words='english',
                     binary=False,
                     max_df=0.95, 
                     min_df=0.15,
                     ngram_range = (1,2),use_idf = False, norm = None)
doc_vectors = vectorizer.fit_transform(descriptions['clean_teks'])
# print(doc_vectors.shape)
# print(vectorizer.get_feature_names())

# =[Routing]=====================================

# [Routing untuk API]		
# @app.route('/', methods=['POST'])
def comp_description(query, results_number=20):
		if request.method=='POST':
			results=[]
			q_vector = vectorizer.transform([query])
			print("Comparable Description: ", query)
			results.append(cosine_similarity(q_vector, doc_vectors.toarray()))
			f=0
			elem_list=[]
			for i in results[:10]:
				for elem in i[0]:
						elem_list.append(elem)
						f+=1
				print("The Review Most similar to the Comparable Description is Description #" ,elem_list.index(max(elem_list)))
				print("Similarity: ", max(elem_list))
				if sum(elem_list) / len(elem_list)==0.0:
					print("No similar descriptions")
				else:
        			return jsonify({"data": hasil,})
					print(descriptions['Title'].loc[elem_list.index(max(elem_list)):elem_list.index(max(elem_list))])
                
# [Routing untuk API]		)
@app.route("/api/deteksi",methods=['POST'])
def apiDeteksi():
    text_input = ""
    
    if request.method=='POST':
        text_input = request.form['data']
        text_input = text_preprocessing_process(text_input,key_norm,stopwords_ind,stemmer)
        hasil = comp_description(text_input)
        return jsonify({"data": hasil,})

# =[Main]========================================

if __name__ == '__main__':
	
	# Setup
	stopwords_ind = stopwords.words('indonesian')
	stopwords_ind = stopwords_ind + more_stopword
	
	key_norm = pd.read_csv('key_norm_merge.csv')
	
	factory = StemmerFactory()
	stemmer = factory.create_stemmer()
 
	vocab = pickle.load(open('kbest_feature.pickle', 'rb'))

	# Run Flask di localhost 
	app.run(host="localhost", port=5000, debug=True)
	
	
